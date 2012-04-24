<?php
/*
  $Id: shopping_cart.php,v 1.73 2003/06/09 23:03:56 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
global $easy_discount;
  require("includes/application_top.php");
  $total = $cart->count_contents(false);
  if ($total > 0) {
    include(DIR_WS_CLASSES . 'payment.php');
    $payment_modules = new payment;
  }
  
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SHOPPING_CART);
  
  //On recupere le nombre de cadeaux maximum
  $max_gifts = $cart->max_gifts();
  $nb_gifts = $cart->count_gifts('nb');
  $can_have_nb_gift = $cart->can_have_nb_gift();

  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping;
  $quote = $shipping_modules->quote('flat', 'flat');
  $fp = $quote[0]['methods'][0]['cost'];
  
  if (defined('SPECIAL_PROMO'.$total))
    $promo_nb = '<h1 class="ubber_promo'.$total.'">'.constant('SPECIAL_PROMO'.$total).'</h1>';
  else {
	$flat = new flat();
    $promo_nb = sprintf(SPECIAL_PROMO, $flat->get_offers());
  }

  $subtotal_cart = $cart->show_total();
  $discounts = $easy_discount->get_all();
  $nb_discount_cart = $nb_products_discount->discount;
  $discount_cart = $easy_discount->total() + $nb_discount_cart;
  $total_cart = $subtotal_cart - $discount_cart + $fp;
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_SHOPPING_CART));
  
  if (isset($_GET['min_products']))
    $messageStack->add('cart', MIN_PRODUCTS);

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script language="javascript">
function session_win2() {
  window.open("<?php echo tep_href_link(FILENAME_INFO_COUPON); ?>","info_coupon"," height=360,width=700,toolbar=no,statusbar=no,scrollbars=yes").focus();
}
function autotab(original,destination){if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))destination.focus()}

var max_gifts = <?php echo $max_gifts;?>;
var gifts_left = <?php echo $max_gifts;?>;

function chooseGift() {
  document.getElementById('popup').style.display = 'block';
}

function addGift(id) {
  if (gifts_left > 0) {
    var v = $('#gifts').attr('value');

    if (v == '')
      $('#gifts').attr('value', id);
    else
      $('#gifts').attr('value', v + ';' + id);

    $('#gift_content').html($('#gift_content').html() + $('#gift_'+id).html());
    $('#submit_gifts').attr('style', 'display:block;');
    gifts_left--;
    $('#gifts_left').html(gifts_left);
  }
}

function resetGifts(id) {
  $('#gifts').attr('value', '');
  $('#gift_content').html('');
  $('#submit_gifts').attr('style', 'display:none;');
  gifts_left = max_gifts;
}
</script>
<?php require_once(DIR_WS_INCLUDES.'head.php'); ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<?php if ($total > 1 && $can_have_nb_gift) {?>
<div id="popup" style="display:none;">
  <div id="block_popup">
    <center>
      <div id="contenu_popup">
        <?php echo '<h2 style="text-align:center;color:red;">'.($max_gifts > 1 ? CHOOSE_YOUR_GIFTS : CHOOSE_YOUR_GIFT).'<a style="float:right;text-decoration:none;color:black;" href="'.tep_href_link(FILENAME_SHOPPING_CART.'#').'" onclick="document.getElementById(\'popup\').style.display = \'none\';">X</a></h2><hr />';
        //new contentBox($info_box_contents3, false);
        ?>
        <hr />
        <br>
        <form action="<?php echo tep_href_link(FILENAME_SHOPPING_CART);?>" method="POST" id="submit_gifts" style="display:none">
          <div><?php echo $max_gifts > 1 ? CHOOSEN_GIFTS . ' (<span id="gifts_left"></span> '.GIFTS_LEFT.')' : CHOOSEN_GIFT;?></div>
          <br>
          <div id="gift_content" class="product"></div>
          <br>
          <input type="hidden" id="gifts" name="gifts" value="" />
          <input type="reset" value="<?php echo IMAGE_BUTTON_CANCEL;?>" onclick="resetGifts();" />
          <input type="submit" value="<?php echo IMAGE_BUTTON_CONTINUE;?>" />
        </form>
      </div>
    </center>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php } ?>
<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->
    <td width="100%" class="col_center">
<?php tep_draw_heading_top(901);?>

<?php new contentBoxHeading_ProdNew($info_box_contents);?>

<?php tep_draw_heading_top_1();?>
    <?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_SHOPPING_CART, 'action=update_product')); ?><table border="0"cellspacing="0" cellpadding="0">
      <tr>
        <td>
<?php
  if ($total > 0) {
    if ($messageStack->size('cart') > 0) {
    ?>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td><?php echo $messageStack->output('cart'); ?></td>
          </tr>
          <tr>
            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
          </table>
    <?php
      }
      elseif (!empty($cart_error)) {
    ?>
        <table cellpadding="0" cellspacing="0">
          <tr>
           <td class="messageStackError"><img src="<?php echo DIR_WS_IMAGES?>/icons/error.gif" alt="Erreur" title=" Erreur " border="0" height="10" width="10"> <?php echo constant($cart_error); ?></td>
          </tr>
          <tr>
            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
          </table>
    <?php
        tep_session_unregister('cart_error');
      }

    $info_box_contents = array();
    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => ' class="shop_cart remove" ',
                                    'text' => ''.TABLE_HEADING_REMOVE.'');

    $info_box_contents[0][] = array('align' => 'center',
									'params' => ' class="shop_cart products"',
                                    'text' => ''.TABLE_HEADING_PRODUCTS.'');

    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => ' class="shop_cart quantity"',
                                    'text' => ''.TABLE_HEADING_QUANTITY.'');

    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => ' class="shop_cart total"',
                                    'text' => ''.TABLE_HEADING_TOTAL.'');

    $any_out_of_stock = 0;
    $products = $cart->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
// Push all attributes information in an array
      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        while (list($option, $value) = each($products[$i]['attributes'])) {
          echo tep_draw_hidden_field('id[' . $products[$i]['id'] . '][' . $option . ']', $value);
          $attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix
                                      from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                      where pa.products_id = '" . (int)$products[$i]['id'] . "'
                                       and pa.options_id = '" . (int)$option . "'
                                       and pa.options_id = popt.products_options_id
                                       and pa.options_values_id = '" . (int)$value . "'
                                       and pa.options_values_id = poval.products_options_values_id
                                       and popt.language_id = '" . (int)$languages_id . "'
                                       and poval.language_id = '" . (int)$languages_id . "'");
          $attributes_values = tep_db_fetch_array($attributes);

          $products[$i][$option]['products_options_name'] = $attributes_values['products_options_name'];
          $products[$i][$option]['options_values_id'] = $value;
          $products[$i][$option]['products_options_values_name'] = $attributes_values['products_options_values_name'];
          $products[$i][$option]['options_values_price'] = $attributes_values['options_values_price'];
          $products[$i][$option]['price_prefix'] = $attributes_values['price_prefix'];
        }
      }
    }
$products_ids = '';  //use for the tag in last line.
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      $products_ids .= $products[$i]['id'].',';
      if (($i/2) == floor($i/2)) {
        $info_box_contents[] = array('params' => 'class=""'); //  background place
      } else {
        $info_box_contents[] = array('params' => 'class=""'); //  background place
      }

      $cur_row = sizeof($info_box_contents) - 1;

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => ' class="remove"',
                                             'text' => '<br style="line-height:10px">'.(!$products[$i]['gift'] ? tep_draw_checkbox_field('cart_delete[]', $products[$i]['str_id'], false, ' onclick="document.getElementById(\'update_cart_submit\').click();" '): ''));

      $products_name = '

					<table cellpadding="0" cellspacing="10" border="0">
						<tr>

							 <td align="center" class="vam"><table cellpadding="0" cellspacing="0" border="0" style="width:124px"><tr><td align="center">
								'.tep_draw_prod_pic_top().'<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id'].rewrite_product($products[$i])) . '">' . tep_image(DIR_WS_PWS_IMAGE . $products[$i]['image'], $products[$i]['name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>'.tep_draw_prod_pic_bottom().'</td></tr></table>
							'.tep_draw_separator('spacer.gif', '1', '10').'
								<br><em>'.display_product_name($products[$i]['name'], $products[$i]).'</em>';



      if (STOCK_CHECK == 'true') {
        $stock_check = tep_check_stock($products[$i]['id'], $products[$i]['quantity']);
        if (tep_not_null($stock_check)) {
          $any_out_of_stock = 1;

          $products_name .= $stock_check;
        }
      }

      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        reset($products[$i]['attributes']);
        while (list($option, $value) = each($products[$i]['attributes'])) {
          $products_name .= '<br style="line-height:1px;"><br style="line-height:5px;"><small><i> - ' . $products[$i][$option]['products_options_name'] . ' ' . $products[$i][$option]['products_options_values_name'] . '</i></small>';
        }
      }
		$products_name .= '
							</td>

						</tr>
					</table>';


      $info_box_contents[$cur_row][] = array('params' => ' class="products"',
                                             'text' => $products_name);

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => ' class="quantity"',
                                             'text' => '<br style="line-height:10px">'.
                                             (!$products[$i]['gift'] && !$products[$i]['promo']
                                             ? ($products[$i]['quantity'] > 1
                                                 ? display_box('minus', $i)
                                                 : '').
                                                 tep_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'size="4" id="input'.$i.'" class="input_item"') .
                                             tep_draw_hidden_field('products_id[]', $products[$i]['id']).display_box('plus', $i)
                                             : ($products[$i]['promo'] ?
                                              tep_draw_hidden_field('products_id[]', $products[$i]['str_id']) . $products[$i]['quantity']
                                             :$products[$i]['quantity']))
                                            );

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => ' class="total"',
                                             'text' => '<br style="line-height:10px"><span class="productSpecialPrice">' . ($products[$i]['promo'] ? '<s><i>' . $currencies->display_price($products[$i]['sell_price'], tep_get_tax_rate($products[$i]['tax_class_id']), $products[$i]['quantity']) . '</i></s><br /><br />': '') . (!$products[$i]['gift'] || $products[$i]['promo'] ? $currencies->display_price($products[$i]['final_price'], tep_get_tax_rate($products[$i]['tax_class_id']), $products[$i]['quantity']) : STR_GIFT ) . '</span>');
    }

   new productListingBox($info_box_contents);
?>

<?php
    if ($any_out_of_stock == 1) {
      if (STOCK_ALLOW_CHECKOUT == 'true') {
?>
      <table cellpadding="0" cellspacing="0" border="0">
	  		<tr><td class="stockWarning" align="center"><br><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></td></tr>
	  </table>
<?php
      } else {
?>
      <table cellpadding="0" cellspacing="0" border="0">
	  		<tr><td class="stockWarning" align="center"><br><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></td></tr>
	  </table>
<?php
      }
    }
?>

	<table cellpadding="0" cellspacing="0" border="0"><tr><td class="cart_line_x"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr></table>

				<table cellspacing="0" cellpadding="0" border="0" class="product">

				<tr><td style="vertical-align:middle">
                <?php if ($cart->count_gifts('min') == 0) {echo $promo_nb; /*if ($total < 3) new contentBox($info_box_contents2, false);*/}?>
                </td><td><table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td width="80%" align="right" class="cart_total_left" nowrap>
                        <strong><?php echo SUB_TITLE_SUB_TOTAL; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="20%" align="center" class="cart_total_right">
							<span class="productSpecialPrice"><?php echo $currencies->format($cart->show_total()); ?></span>
						</td>
					</tr>
                    <?php
                    if ($discount_cart > 0) {
                        if (sizeof($discounts) > 0 || $nb_discount_cart > 0 && sizeof($discounts) > 0)
                            foreach ($discounts as $discount) {
                        ?>
    					<tr>
    						<td width="80%" align="right" class="cart_total_left" nowrap>
                            <strong><?php echo $discount['description']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    						<td width="20%" align="center" class="cart_total_right">
    							<span class="productSpecialPrice">-<?php echo $currencies->format($discount['amount']); ?></span>
    						</td>
    					</tr>
                        <?php }
                        if ($nb_discount_cart > 0) { ?>
					<tr>
						<td width="80%" align="right" class="cart_total_left" nowrap>
                        <strong><?php echo SUB_TITLE_NB_PRODUCTS_DISCOUNT; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="20%" align="center" class="cart_total_right">
							<span class="productSpecialPrice">-<?php echo $currencies->format($nb_discount_cart); ?></span>
						</td>
					</tr>
                    <?php }
                        if (sizeof($discounts) > 0) { ?>
					<tr>
						<td width="80%" align="right" class="cart_total_left" nowrap>
                        <strong><?php echo SUB_TITLE_EASY_DISCOUNT; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="20%" align="center" class="cart_total_right">
							<span class="productSpecialPrice">-<?php echo $currencies->format($discount_cart); ?></span>
						</td>
					</tr>
                    <?php }
                    if (sizeof($discounts) < 0) { ?>
					<tr>
						<td width="80%" align="right" class="cart_total_left" nowrap>
                        <strong><?php echo SUB_TITLE_EASY_DISCOUNT2; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="20%" align="center" class="cart_total_right">
							<span class="productSpecialPrice">-<?php echo $currencies->format($discount_cart); ?></span>
						</td>
					</tr>
                    <?php }
                        } ?>
					<tr>
						<td width="80%" align="right" class="cart_total_left" nowrap>
                        <strong><?php echo SUB_TITLE_FRAIS_PORT; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="20%" align="center" class="cart_total_right">
							<span class="productSpecialPrice"><?php echo $fp <= 0 ? FREE_SHIPPING_COST : $currencies->format($fp); ?></span>
						</td>
					</tr>
					<tr>
						<td width="80%" align="right" class="cart_total_left" nowrap>
                        <strong><?php echo SUB_TITLE_TOTAL; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="20%" align="center" class="cart_total_right">
							<span id="order_total" class="productSpecialPrice"><?php echo $currencies->format($total_cart <= 0 ? 0 : $total_cart); ?></span>
						</td>
					</tr>
    </table></td></tr>
				</table>

	<table cellpadding="0" cellspacing="0" border="0"><tr><td class="cart_line_x"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr></table>

				<table cellspacing="0" cellpadding="0" border="0" >
					<tr>
						<td style="padding:15px 20px 0px 0px;" class="padd33 bg_input">

						<?php echo tep_image_submit('button_update.gif', IMAGE_BUTTON_UPDATE_CART, ' id="update_cart_submit" '); ?>   <?php

					$back = sizeof($navigation->path)-2;
					if (isset($navigation->path[$back])) {

				echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue_shopping.gif', IMAGE_BUTTON_CONTINUE_SHOPPING) . '</a>';
				}

				echo '<a href="' . tep_href_link(/*$can_have_nb_gift ? FILENAME_SHOPPING_CART.'#' : */FILENAME_CHECKOUT, '', 'SSL') . '"'.(0 && $can_have_nb_gift ? ' onclick="chooseGift();"' : '').'>' . tep_image_button('button_checkout.gif', IMAGE_BUTTON_CHECKOUT) . '</a>';
				?></td>
					</tr>
				</table>
                <?php if (ACTIVATE_DISCOUNT) include (DIR_WS_MODULES.'easy_coupons_box.php'); ?>

<?php
	if (!empty($cart_error)) {
?>
    <table cellpadding="0" cellspacing="0">
      <tr>
       <td class="messageStackError"><img src="<?php echo DIR_WS_IMAGES?>/icons/error.gif" alt="Erreur" title=" Erreur " border="0" height="10" width="10"> <?php echo $cart_error; ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      </table>
<?php
	}
  }
  else {
?>
    <br style="line-height:1px;"><br style="line-height:5px;">


			<table border="0" cellspacing="0" cellpadding="2">
              <tr>
			  	<td></td>
				<td align="center" width="100%"><br><?php new infoBox_77(array(array('text' => TEXT_CART_EMPTY))); ?></td>
				<td></td>
			  </tr>
			  <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right" class="main" width="100%"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?><br><br></td>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
			  <tr><td colspan="3" height="5"></td></tr>
            </table>
<?php } ?>

    </table></form>

<?php tep_draw_heading_bottom_1();?>

<?php tep_draw_heading_bottom();?>
</td>
<!-- body_text_eof //-->
    <td class="col_right">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </td>
  </tr>
</table>
<!-- body_eof //-->

<?php if ($check_server == 'fr') { ?>
<script src="http://nxtck.com/act.php?zid=15885"></script>
<script type="text/javascript">var journeycode='cb315074-8bd8-4823-a0f8-b6166358963e';var captureConfigUrl='rcs.veinteractive.com/CaptureConfigService.asmx/CaptureConfig'; (function() {     var ve = document.createElement('script'); ve.type = 'text/javascript'; ve.async = true;     ve.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'config1.veinteractive.com/vecapturev5.js';     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ve, s);})();</script>
<?php } ?>
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php');

function display_box($type, $i)
{
    $value = ($type == 'minus' ? '' : '-') . '1';
    $comp = $type == 'minus' ? '>' : '>=';
    return '<a class="box_button_'.$type.'" href="#" onclick="if (document.getElementById(\'input'.$i.'\').value '.$comp.' 1) {document.getElementById(\'input'.$i.'\').value=document.getElementById(\'input'.$i.'\').value - '.$value.';document.getElementById(\'update_cart_submit\').click();}return false;">'.($type == 'minus' ? '-' : '+').'</a>';
}
?>
<script type="text/javascript" src="http://img.netaffiliation.com/u/31/p13233.js?zone=panier&montant=<?php echo $cart->show_total(false)*$currencies->currencies[$currency]['value']/1.196;?>&listeids=<?php echo $products_ids;?>"></script>