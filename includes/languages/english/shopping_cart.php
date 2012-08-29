<?php
/*
  $Id: shopping_cart.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Cart Contents');
define('HEADING_TITLE', 'What\'s In My Cart?');
define('TABLE_HEADING_REMOVE', 'Remove');
define('TABLE_HEADING_QUANTITY', 'Qty.');
define('TABLE_HEADING_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Product(s)');
define('TABLE_HEADING_TOTAL', 'Total');
define('TEXT_CART_EMPTY', 'Your Shopping Cart is empty!');
define('SUB_TITLE_SUB_TOTAL', 'Sub-Total:');
define('SUB_TITLE_TOTAL', 'Total:');
define('SUB_TITLE_FRAIS_PORT', 'Postage:');
define('SUB_TITLE_NB_PRODUCTS_DISCOUNT', 'Discount :');
define('PROMO_NB', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">If you buy <span class="text_red">%s productcs</span> :<li> get a <span class="text_red">%s</span> discount</li></ul>');
define('PROMO_NB1', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">If you buy <span class="text_red">%s products</span> :<li> get a <span class="text_red">%s</span> discount,</li><li><span class="text_red">Shower gel</span> Hugo Boss offered,</li><li><span class="text_red">5 euros</span> disount on your postage</li></ul>');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Products marked with ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' dont exist in desired quantity in our stock.<br>Please alter the quantity of products marked with (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Thank you');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Products marked with ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' dont exist in desired quantity in our stock.<br>You can buy them anyway and check the quantity we have in stock for immediate deliver in the checkout process.');

define('STR_GIFT', 'Your offered gift');
define('STR_GIFT_CHOOSE', '<script type="text/javascript">document.write(\'<br /><br />You prefer a different gift?<br /><a href="'.tep_href_link(FILENAME_SHOPPING_CART).'#" onclick="document.getElementById(\\\'popup\\\').style.display = \\\'block\\\'">Click here!</a>\');</script>');
define('CART_MAX_AMOUNT_REACHED', 'For safety, the maximum amount of an order is limited to 300 €');

define('FREE_SHIPPING_COST', 'Offered');
define('PROMO_SHIPPING_COST', '
<ul class="promo_nb promo_nb2" id="promo_nb1">
For the purchase of two fragrances:<br />
<span class="text_red">
<li>Free shippings!</li>
<li>A shower gel Hugo Boss offered!</li>
</span>
</ul>');

define('MIN_PRODUCTS', '<span class="min_products">Please add a product in your shopping cart in order to complete your order.</span>');

define('SPECIAL_PROMO', '<br /><b>Table of current offers:</b><br />
<table cellpadding="2" cellspacing="0" class="special_promo" style="text-align:center;margin:5px 0;" align="center" border="1">
<tr class="header" style="font-weight:bold;">
  <td>Nb products<br />purchased</td><td>Shipping</td><td>Immediate reduction</td>
</tr><tr>
  <td>1</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(14 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
  <td>0</td>
</tr><tr class="second">
  <td>2</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(7 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
  <td>0</td>
</tr><tr>
  <td>3</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(3 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
  <td>0</td>
</tr><tr class="second">
  <td>4</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(3 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(5 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr><tr>
  <td>5</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(3 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(15 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr><tr class="second">
  <td>6</td>
  <td>Free</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(22 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr><tr>
  <td>7</td>
  <td>Free</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(29 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr><tr class="second">
  <td>8</td>
  <td>Free</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(36 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr><tr>
  <td>9</td>
  <td>Free</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(43 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr><tr class="second">
  <td>10</td>
  <td>Free</td>
  <td>'.$currencies->currencies[$currency]['symbol_left'].round(50 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</td>
</tr>
</table>
');

define('SPECIAL_PROMO1', 'Buy 2 items and pay only '.$currencies->currencies[$currency]['symbol_left'].round(7 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].' shipping.');
define('SPECIAL_PROMO2', 'Buy 3 items and pay only '.$currencies->currencies[$currency]['symbol_left'].round(3 / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].' shipping.');

define('CHOOSE_YOUR_GIFT', 'Choose your gift');
define('CHOOSE_YOUR_GIFTS', 'Choose your gifts');
define('GIFTS_LEFT', 'remaining');
define('CHOOSEN_GIFTS', 'Gifts selected :');
define('CHOOSEN_GIFT', 'Chosen gift :');
define('CART_MAX_AMOUNT_BY_PRODUCT_REACHED', 'You can only buy up to '.MAX_SAME_PRODUCTS.' identical products.');
?>