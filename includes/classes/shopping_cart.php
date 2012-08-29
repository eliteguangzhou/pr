<?php
/*
  $Id: shopping_cart.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  class shoppingCart {
    var $contents, $total, $weight, $cartID, $content_type;

    function shoppingCart() {
      $this->reset();
    }

    function restore_contents() {
      global $customer_id;

      if (!tep_session_is_registered('customer_id')) return false;

// insert current cart contents in database
      if (is_array($this->contents)) {
        reset($this->contents);
        while (list($products_id, ) = each($this->contents)) {
          $qty = $this->contents[$products_id]['qty'];
          $product_query = tep_db_query("select products_id from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products_id) . "'");
          if (!tep_db_num_rows($product_query)) {
            tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET . " (customers_id, products_id, customers_basket_quantity, customers_basket_date_added) values ('" . (int)$customer_id . "', '" . tep_db_input($products_id) . "', '" . tep_db_input($qty) . "', '" . date('Ymd') . "')");
            if (isset($this->contents[$products_id]['attributes'])) {
              reset($this->contents[$products_id]['attributes']);
              while (list($option, $value) = each($this->contents[$products_id]['attributes'])) {
                tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " (customers_id, products_id, products_options_id, products_options_value_id) values ('" . (int)$customer_id . "', '" . tep_db_input($products_id) . "', '" . (int)$option . "', '" . (int)$value . "')");
              }
            }
          } else {
            tep_db_query("update " . TABLE_CUSTOMERS_BASKET . " set customers_basket_quantity = '" . tep_db_input($qty) . "' where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products_id) . "'");
          }
        }
      }

// reset per-session cart contents, but not the database contents
      $this->reset(false);

      $products_query = tep_db_query("select products_id, customers_basket_quantity from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (int)$customer_id . "'");
      while ($products = tep_db_fetch_array($products_query)) {
        $this->contents[$products['products_id']] = array('qty' => $products['customers_basket_quantity']);
// attributes
        $attributes_query = tep_db_query("select products_options_id, products_options_value_id from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products['products_id']) . "'");
        while ($attributes = tep_db_fetch_array($attributes_query)) {
          $this->contents[$products['products_id']]['attributes'][$attributes['products_options_id']] = $attributes['products_options_value_id'];
        }
      }

      $this->cleanup();
    }

    function reset($reset_database = false) {
      global $customer_id;

      $this->contents = array();
      $this->total = 0;
      $this->weight = 0;
      $this->content_type = false;

      if (tep_session_is_registered('customer_id') && ($reset_database == true)) {
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (int)$customer_id . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " where customers_id = '" . (int)$customer_id . "'");
      }

      unset($this->cartID);
      if (tep_session_is_registered('cartID')) tep_session_unregister('cartID');
    }

    function add_cart($products_id, $qty = '1', $attributes = '', $notify = true, $gift = false, $new_price = false) {
      global $new_products_id_in_cart, $customer_id, $easy_discount, $currencies, $currency;

      $products_id_string = tep_get_uprid($products_id, $attributes);
      $products_id = tep_get_prid($products_id_string);
      $products_id_string = ($gift ? 'gift_'.$gift.'_' : '').$products_id_string;

      if (defined('MAX_QTY_IN_CART') && (MAX_QTY_IN_CART > 0) && ((int)$qty > MAX_QTY_IN_CART)) {
        $qty = MAX_QTY_IN_CART;
      }

      $attributes_pass_check = true;

      if (is_array($attributes)) {
        reset($attributes);
        while (list($option, $value) = each($attributes)) {
          if (!is_numeric($option) || !is_numeric($value)) {
            $attributes_pass_check = false;
            break;
          }
        }
      }
      if (is_numeric($products_id) && is_numeric($qty) && ($attributes_pass_check == true)) {
        $check_product_query = tep_db_query("select products_status, products_price, buy_price from " . TABLE_PRODUCTS . " where products_id = '" . (int)$products_id . "'");
        $check_product = tep_db_fetch_array($check_product_query);
        $check_product['products_price'] = get_price($new_price ? $new_price : $check_product['products_price']);

        if (($check_product !== false) && ($check_product['products_status'] == '1')) {
          if ($qty > MAX_SAME_PRODUCTS)
            return CART_MAX_AMOUNT_BY_PRODUCT_REACHED;
          elseif ( $this->in_cart($products_id_string) && $this->show_total() + $check_product['products_price'] * ((int)$qty - $this->contents[$products_id_string]['qty']) <= MAX_CART_AMOUNT / $currencies->currencies[$currency]['value']
            || !$this->in_cart($products_id_string) && $this->show_total() + $check_product['products_price'] * $qty <= MAX_CART_AMOUNT / $currencies->currencies[$currency]['value']) {
              if ($notify == true) {
                $new_products_id_in_cart = $products_id;
                tep_session_register('new_products_id_in_cart');
              }

              if ($this->in_cart($products_id_string)) {
                $this->update_quantity($products_id_string, $qty, $attributes);
              } else {
                $this->contents[$products_id_string] = array('buy_price' => $check_product['buy_price'], 'qty' => (int)$qty, 'price' => $check_product['products_price']);
    // insert into database
                if (tep_session_is_registered('customer_id')) tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET . " (customers_id, products_id, customers_basket_quantity, customers_basket_date_added) values ('" . (int)$customer_id . "', '" . tep_db_input($products_id_string) . "', '" . (int)$qty . "', '" . date('Ymd') . "')");

                if (is_array($attributes)) {
                  reset($attributes);
                  while (list($option, $value) = each($attributes)) {
                    $this->contents[$products_id_string]['attributes'][$option] = $value;
    // insert into database
                    if (tep_session_is_registered('customer_id')) tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " (customers_id, products_id, products_options_id, products_options_value_id) values ('" . (int)$customer_id . "', '" . tep_db_input($products_id_string) . "', '" . (int)$option . "', '" . (int)$value . "')");
                  }
                }
              }
              $this->cleanup();

    // assign a temporary unique ID to the order contents to prevent hack attempts during the checkout procedure
              $this->cartID = $this->generate_cart_id();
            }
            else
                return CART_MAX_AMOUNT_REACHED;
        }
        $this->gift();
        $easy_discount->recalculate();
      }
    }

    function update_quantity($products_id, $quantity = '', $attributes = '') {
      global $customer_id, $easy_discount, $currencies, $currency;

      $products_id_string = tep_get_uprid($products_id, $attributes);
      $products_id = tep_get_prid($products_id_string);

      if (defined('MAX_QTY_IN_CART') && (MAX_QTY_IN_CART > 0) && ((int)$quantity > MAX_QTY_IN_CART)) {
        $quantity = MAX_QTY_IN_CART;
      }

      $attributes_pass_check = true;

      if (is_array($attributes)) {
        reset($attributes);
        while (list($option, $value) = each($attributes)) {
          if (!is_numeric($option) || !is_numeric($value)) {
            $attributes_pass_check = false;
            break;
          }
        }
      }

    if (is_numeric($products_id) && isset($this->contents[$products_id_string]) && is_numeric($quantity) && ($attributes_pass_check == true)) {
        if ($quantity > MAX_SAME_PRODUCTS)
            return CART_MAX_AMOUNT_BY_PRODUCT_REACHED;
        elseif ($this->show_total() + $this->contents[$products_id_string]['price'] * ((int)$quantity -$this->contents[$products_id_string]['qty']) <= MAX_CART_AMOUNT / $currencies->currencies[$currency]['value']) {
            $this->contents[$products_id_string]['qty'] = (int)$quantity;
    // update database
            if (tep_session_is_registered('customer_id')) tep_db_query("update " . TABLE_CUSTOMERS_BASKET . " set customers_basket_quantity = '" . (int)$quantity . "' where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products_id_string) . "'");

            if (is_array($attributes)) {
              reset($attributes);
              while (list($option, $value) = each($attributes)) {
                $this->contents[$products_id_string]['attributes'][$option] = $value;
    // update database
                if (tep_session_is_registered('customer_id')) tep_db_query("update " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " set products_options_value_id = '" . (int)$value . "' where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products_id_string) . "' and products_options_id = '" . (int)$option . "'");
              }
            }
            $this->gift();
            $easy_discount->recalculate();
        }
        else
            return CART_MAX_AMOUNT_REACHED;
      }
    }

    function cleanup() {
      global $customer_id;

      reset($this->contents);
      while (list($key,) = each($this->contents)) {
        if ($this->contents[$key]['qty'] < 1) {
          unset($this->contents[$key]);
// remove from database
          if (tep_session_is_registered('customer_id')) {
            tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($key) . "'");
            tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($key) . "'");
          }
        }
      }
    }

    function count_contents($include_gifts = true) {  // get total number of items in cart
      $total_items = 0;
      if (is_array($this->contents)) {
        reset($this->contents);
        while (list($products_id, ) = each($this->contents)) {
          if ($include_gifts || !$include_gifts && !$this->is_gift($products_id))
            $total_items += $this->get_quantity($products_id);
        }
      }

      return $total_items;
    }

    function get_quantity($products_id) {
      if (isset($this->contents[$products_id])) {
        return $this->contents[$products_id]['qty'];
      } else {
        return 0;
      }
    }

    function in_cart($products_id) {
      if (isset($this->contents[$products_id])) {
        return true;
      } else {
        return false;
      }
    }

    function remove($products_id, $check_gift = true) {
      global $customer_id, $easy_discount;
      
      unset($this->contents[$products_id]);
// remove from database
      if (tep_session_is_registered('customer_id')) {
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products_id) . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " where customers_id = '" . (int)$customer_id . "' and products_id = '" . tep_db_input($products_id) . "'");
      }

// assign a temporary unique ID to the order contents to prevent hack attempts during the checkout procedure
      $this->cartID = $this->generate_cart_id();
      if ($check_gift)
        $this->gift();
      $easy_discount->recalculate();
    }

    function remove_all() {
      $this->reset();
    }

    function get_product_id_list() {
      $product_id_list = '';
      if (is_array($this->contents)) {
        reset($this->contents);
        while (list($products_id, ) = each($this->contents)) {
          $product_id_list .= ', ' . $products_id;
        }
      }

      return substr($product_id_list, 2);
    }

    function calculate() {
      global $currencies, $easy_discount;
		
	  	
      $this->total = 0;
      $this->weight = 0;
      if (!is_array($this->contents)) return 0;

      reset($this->contents);
      while (list($products_id, ) = each($this->contents)) {
        $is_gift = $this->is_gift($products_id);
        $products_id_int = $this->get_id($products_id);
        $qty = $this->contents[$products_id]['qty'];

// products price
        $product_query = tep_db_query("select products_id, products_price, products_tax_class_id, products_weight from " . TABLE_PRODUCTS . " where products_id = '" . (int)$products_id_int . "'");
        if ($product = tep_db_fetch_array($product_query)) {
          $prid = $product['products_id'];
          $products_tax = tep_get_tax_rate($product['products_tax_class_id']);
          $products_price = $is_gift ? 0 : get_price($this->is_gift($products_id, false) ? $this->contents[$products_id]['price'] : $product['products_price']);
          $products_weight = $product['products_weight'];
/*
          $specials_query = tep_db_query("select specials_new_products_price from " . TABLE_SPECIALS . " where products_id = '" . (int)$prid . "' and status = '1'");
          if (tep_db_num_rows ($specials_query)) {
            $specials = tep_db_fetch_array($specials_query);
            $products_price = get_price($specials['specials_new_products_price']);
          }*/

          $this->total += $currencies->calculate_price($products_price, $products_tax, $qty);
          $this->weight += ($qty * $products_weight);
        }

// attributes price
        if (isset($this->contents[$products_id]['attributes'])) {
          reset($this->contents[$products_id]['attributes']);
          while (list($option, $value) = each($this->contents[$products_id]['attributes'])) {
            $attribute_price_query = tep_db_query("select options_values_price, price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id = '" . (int)$prid . "' and options_id = '" . (int)$option . "' and options_values_id = '" . (int)$value . "'");
            $attribute_price = tep_db_fetch_array($attribute_price_query);
            if ($attribute_price['price_prefix'] == '+') {
              $this->total += $currencies->calculate_price($attribute_price['options_values_price'], $products_tax, $qty);
            } else {
              $this->total -= $currencies->calculate_price($attribute_price['options_values_price'], $products_tax, $qty);
            }
          }
        }
      }
    }

    function attributes_price($products_id) {
      $attributes_price = 0;

      if (isset($this->contents[$products_id]['attributes'])) {
        reset($this->contents[$products_id]['attributes']);
        while (list($option, $value) = each($this->contents[$products_id]['attributes'])) {
          $attribute_price_query = tep_db_query("select options_values_price, price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id = '" . (int)$products_id . "' and options_id = '" . (int)$option . "' and options_values_id = '" . (int)$value . "'");
          $attribute_price = tep_db_fetch_array($attribute_price_query);
          if ($attribute_price['price_prefix'] == '+') {
            $attributes_price += $attribute_price['options_values_price'];
          } else {
            $attributes_price -= $attribute_price['options_values_price'];
          }
        }
      }

      return $attributes_price;
    }

    function get_products() {
      global $languages_id;

      if (!is_array($this->contents)) return false;

      $products_array = array();
      reset($this->contents);
      while (list($products_id, ) = each($this->contents)) {
        $is_gift = $this->is_gift($products_id);
        $gift_type = '';
        if ($is_gift) {
          $gift_type = substr($products_id, strpos($products_id, '_') + 1);
          $gift_type = substr($gift_type, 0, strpos($gift_type, '_'));
        }
        $products_id_int = $this->get_id($products_id);
        
        $products_query = tep_db_query("select
            p.products_id,
            pd.products_description,
            pd.products_name,
            p.products_model,
            p.products_image,
            p.products_price,
            p.products_weight,
            p.products_tax_class_id,
            p.buy_price,
            pd.item_size,
            cd.categories_name
          from " . TABLE_PRODUCTS . " p,
            " . TABLE_PRODUCTS_DESCRIPTION . " pd,
            " . TABLE_CATEGORIES_DESCRIPTION . " cd,
            " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
          where p.products_id = '" . (int)$products_id_int . "'
          and pd.products_id = p.products_id
          and pd.language_id = '" . (int)$languages_id . "'
          AND cd.language_id = ".(int)$languages_id."
          AND p2c.products_id=p.products_id
          AND p2c.categories_id=cd.categories_id
          ");
        if ($products = tep_db_fetch_array($products_query)) {
          $prid = $products['products_id'];
          $products_price = $is_gift ? 0 : get_price($this->is_gift($products_id, false) ? $this->contents[$products_id]['price'] : $products['products_price']);

          $products_array[] = array('id' => $products_id_int,
                                    'str_id' => $products_id,
                                    'gift' => $is_gift,
                                    'gift_type' => $gift_type,
                                    'promo' => !$is_gift && $this->is_gift($products_id, false),
                                    'name' => $products['products_name'],
                                    'products_description' => $products['products_description'],
                                    'model' => $products['products_model'],
                                    'image' => $products['products_image'],
                                    'price' => $products_price,
                                    'buy_price' => $products['buy_price'],
                                    'quantity' => $this->contents[$products_id]['qty'],
                                    'weight' => $products['products_weight'],
                                    'final_price' => ($products_price + $this->attributes_price($products_id)),
                                    'sell_price' => $products['products_price'],
                                    'tax_class_id' => $products['products_tax_class_id'],
                                    'attributes' => (isset($this->contents[$products_id]['attributes']) ? $this->contents[$products_id]['attributes'] : ''),
                                    'products_name' => $products['products_name'],
                                    'categories_name' => $products['categories_name'],
                                    'item_size' => $products['item_size']);
        }
      }

      return $products_array;
    }

    function show_total() {
      $this->calculate();

      return $this->total;
    }

    function show_weight() {
      $this->calculate();

      return $this->weight;
    }

    function generate_cart_id($length = 5) {
      return tep_create_random_value($length, 'digits');
    }

    function get_content_type() {
      $this->content_type = false;

      if ( (DOWNLOAD_ENABLED == 'true') && ($this->count_contents() > 0) ) {
        reset($this->contents);
        while (list($products_id, ) = each($this->contents)) {
          $is_gift = $this->is_gift($products_id);
          $products_id_int = $this->get_id($products_id);
          if (isset($this->contents[$products_id]['attributes'])) {
            reset($this->contents[$products_id]['attributes']);
            while (list(, $value) = each($this->contents[$products_id]['attributes'])) {
              $virtual_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad where pa.products_id = '" . (int)$products_id_int . "' and pa.options_values_id = '" . (int)$value . "' and pa.products_attributes_id = pad.products_attributes_id");
              $virtual_check = tep_db_fetch_array($virtual_check_query);

              if ($virtual_check['total'] > 0) {
                switch ($this->content_type) {
                  case 'physical':
                    $this->content_type = 'mixed';

                    return $this->content_type;
                    break;
                  default:
                    $this->content_type = 'virtual';
                    break;
                }
              } else {
                switch ($this->content_type) {
                  case 'virtual':
                    $this->content_type = 'mixed';

                    return $this->content_type;
                    break;
                  default:
                    $this->content_type = 'physical';
                    break;
                }
              }
            }
          } else {
            switch ($this->content_type) {
              case 'virtual':
                $this->content_type = 'mixed';

                return $this->content_type;
                break;
              default:
                $this->content_type = 'physical';
                break;
            }
          }
        }
      } else {
        $this->content_type = 'physical';
      }

      return $this->content_type;
    }

    function unserialize($broken) {
      for(reset($broken);$kv=each($broken);) {
        $key=$kv['key'];
        if (gettype($this->$key)!="user function")
        $this->$key=$kv['value'];
      }
    }

    function gift() {
        if (ENABLE_GIFT) {

            $total = 0;
            $packs = array();
            $check_min2 = array();
            $check_min3 = array();
            $reduc_packs = array();
            $already_gift = array();
            $pack_indexes = array();
            $all_gift = array();
            $gift_nb = 0;
            //On compte le total de produit dans le panier qui ne sont pas des produits
            //On verifie aussi si il y a un cadeau pack, non cumulable avec le cadeau hugo boss
            foreach ($this->contents as $index => $content) {
              if (strpos($index, 'gift_') === false || strpos($index, 'gift_promo') !== false)
                $total += $content['qty'];
              else {
                $all_gift[] = $index;
                if (strpos($index, 'gift_pack') !== false) {
                  $temp = str_replace('gift_pack_', '', $index);
                  $packs[] = substr($temp, 0, strpos($temp, '_'));
                  $pack_indexes[] = $index;
                }
                elseif (strpos($index, 'gift_min3_') !== false)
                  $check_min3[] = $index;
                elseif (strpos($index, 'gift_min2_') !== false)
                  $check_min2[] = $index;
                elseif (strpos($index, 'gift_nb_') !== false) {
                  $already_gift[] = $index;
                  $gift_nb += $content['qty'];
                }
                elseif (strpos($index, 'gift_reducpack_') !== false)
                  $reduc_packs[] = $index;
              }
            }

            if ($total == 0) {
              reset($all_gift);
              while(list(,$index) = each($all_gift))
                $this->remove($index, false);
            }
            //Si pack, on verifie que les produits du packs sont tjrs dans le panier
            elseif (count($packs) > 0) {
              while(list($index, $pack) = each($packs)) {
                $have_all_pack = true;
                $check_product_query = tep_db_query("select p.products_id from " . TABLE_PRODUCTS . " p, ".TABLE_PACKS." pa where p.products_model = pa.products_model AND p.products_status = 1 AND p.products_quantity > 2 AND pa.is_gift = 0 AND pa.pack_num  = ".$pack);
                while($check_product = tep_db_fetch_array($check_product_query))
                  if (!isset($this->contents[$check_product['products_id']]))
                    $have_all_pack = false;

                if (!$have_all_pack) {
                  reset($pack_indexes);
                  while(list(,$index) = each($pack_indexes))
                    $this->remove($index, false);
                  unset($packs[$index]);
                }
              }
            }
            //Si cadeau present et (moins de deux articles ou pack present mais non cumulable avec le hugo boss), on retire le cadeau
            if (!empty($already_gift) && ($total < 2 || count($packs) > 0)) {
              reset($already_gift);
              while(list(,$index) = each($already_gift))
                $this->remove($index, false);
            }
            //Si on a des cadeaux via coupon qui necessite 2 produits mini dans le panier
            elseif (!empty($reduc_packs) && $total < 2) {
              reset($reduc_packs);
              while(list(,$index) = each($reduc_packs))
                $this->remove($index, false);
            }
            //Si nb produit = 2, on enleve 1 produit cadeau s'il y en a NB_GIFT_FOR_3
            elseif (!empty($already_gift) && $total < 3 && $gift_nb == NB_GIFT_FOR_3) {
              reset($already_gift);
              while(list(,$index) = each($already_gift))
                $this->remove($index, false);
            }
            //Si cadeau pas present et pas de pack, on l'ajoute si stock
            /*elseif (count($packs) == 0 && $total > 1 && empty($already_gift)) {
              $gifts = array();
              $check_product_query = tep_db_query("select p.products_id, p.products_quantity from " . TABLE_PRODUCTS . " p, " . TABLE_GIFTS . " g where g.products_model = p.products_model and g.gifts_status = 1 and p.products_status = 1 AND p.products_quantity > 0 AND p.products_model IN (".GIFT_MODELS.")");
              while($check_product = tep_db_fetch_array($check_product_query))
                $gifts[] = $check_product['products_id'];

              if (!empty($gifts)) {
                $gift = $gifts[rand(0, count($gifts) - 1)];
                $this->add_cart($gift, 1, '', false, 'nb');
              }
            }
            //Si pas pack et plus de 2 produit, cadeau a 2
            elseif (count($packs) == 0 && $total > 2 && $gift_nb < NB_GIFT_FOR_3) {
              reset($already_gift);
              while(list(,$index) = each($already_gift))
                $this->contents[$index]['qty'] = NB_GIFT_FOR_3;
            }*/

            //On retire les cadeaux coupons necessitant 3 produits mini si il y a mois de 3 produits dans le panier
            if (!empty($check_min3) && $total < 3) {
              reset($check_min3);
              while(list(,$index) = each($check_min3))
                $this->remove($index, false);
            }
            //On retire les cadeaux coupons necessitant 2 produits mini si il y a mois de 2 produits dans le panier
            if (!empty($check_min2) && $total < 2) {
              reset($check_min2);
              while(list(,$index) = each($check_min2))
                $this->remove($index, false);
            }
        }
    }
    
    function is_gift($products_id, $promo = true) {
      return strpos($products_id, 'gift_') !== false && (!$promo || ($promo && strpos($products_id, 'gift_promo') === false));
    }
    
    function get_id($products_id) {
      if (strpos($products_id, '_') !== false)
        return substr($products_id, strrpos($products_id, '_') + 1);
      return $products_id;
    }
    
    function max_gifts() {
      $max_gifts = '0';
      $total = $this->count_contents(false);
      while (!defined('NB_GIFT_FOR_'.$total) && $total > 0)
        $total--;

      if ($total > 0)
        $max_gifts = constant('NB_GIFT_FOR_'.$total);
      return $max_gifts;
    }
    
    function gift_nb_list() {
      return explode(',', GIFT_MODELS);
    }

    function count_gifts($type = '') {
      $total = 0;
      foreach ($this->contents as $index => $content)
        if (strpos($index, 'gift_'.$type) !== false)
          $total += $content['qty'];
      return $total;
    }
    
    function add_gifts($gifts) {
      if (ENABLE_GIFT) {
        $gifts = explode(';', $gifts);

        //On supprime les anciens cadeaux
        foreach ($this->contents as $index => $content)
          if (strpos($index, 'gift_') !== false)
            $this->remove($index, false);

        //On verifie que les cadeaux sont bien dans la liste et on ajoute le max
        $max = $this->max_gifts();
        $gifts_list = array();

        $product_query = tep_db_query('select p.products_id FROM '.TABLE_PRODUCTS.' p, '.TABLE_GIFTS.' g WHERE p.products_status = 1 AND p.products_model IN ('.GIFT_MODELS.') and g.products_model = p.products_model and g.gifts_status = 1');
        while($product = tep_db_fetch_array($product_query))
          $gifts_list[] = $product['products_id'];

        while (list(,$id) = each($gifts))
          if (in_array($id, $gifts_list)) {
            if (isset($this->contents['gift_nb_'.$id]))
              $this->contents['gift_nb_'.$id]['qty']++;
            else {
              $this->add_cart($id, 1, '', false, 'nb');
            }
            if (--$max == 0)
              break;
          }
      }
    }
    
    function can_have_nb_gift() {
      return $this->count_gifts('nb') != $this->max_gifts() && $this->count_gifts('nb') == $this->count_gifts();
    }

	function first_order() {
		global $customer_id;
		if (empty($customer_id)) return true;
		$query = tep_db_query("select COUNT(orders_id) as total
									from customers c
									LEFT JOIN orders o ON
										c.customers_id = o.customers_id
									where c.customers_id = " . $customer_id);
		$rs = tep_db_fetch_array($query);
		return $rs['total'] == 0;
	}
	
  }
?>
