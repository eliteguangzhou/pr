<?php
/*
  $Id: shopping_cart.php,v 1.13 2002/04/05 20:24:02 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Contenu du panier');
define('HEADING_TITLE', 'Qu\'y a t\'il dans mon panier ?');
define('TABLE_HEADING_REMOVE', 'Supprimer');
define('TABLE_HEADING_QUANTITY', 'Qt&eacute;.');
define('TABLE_HEADING_MODEL', 'Mod&eacute;le');
define('TABLE_HEADING_PRODUCTS', 'Produit(s)');
define('TABLE_HEADING_TOTAL', 'Total');
define('TEXT_CART_EMPTY', 'Votre panier est vide ');
define('SUB_TITLE_SUB_TOTAL', 'Sous-Total :');
define('SUB_TITLE_TOTAL', 'Total :');
define('SUB_TITLE_FRAIS_PORT', 'Frais de port :');
define('SUB_TITLE_NB_PRODUCTS_DISCOUNT', 'R&eacute;duction :');
define('PROMO_NB', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">Pour l\'achat de <span class="text_red">%s articles</span> :<li><span class="text_red">%s</span> de r&eacute;duction offerts !</li></ul>');
define('PROMO_NB1', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">Pour l\'achat de <span class="text_red">%s articles</span> :<li><span class="text_red">%s</span> de r&eacute;duction offerts,</li><li><span class="text_red">Un gel douche</span> Hugo Boss offert,</li><li><span class="text_red">5 euros</span> de r&eacute;duction sur vos frais de port !</li></ul>');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Les produits marqu&eacute;s ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantit&eacute; d&eacute;sir&eacute;e.<br>Merci de corriger la quantit&eacute; des articles marqu&eacute;s (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Merci');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Les produits marqu&eacute;s avec ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantit&eacute; d&eacute;sir&eacute;e.<br>Vous pouvez n&eacute;anmoins les acheter ils vous seront d&eacute;livr&eacute;s d&egrave;s disponibilit&eacute;.');

define('STR_GIFT', 'Votre cadeau offert');
define('STR_GIFT_CHOOSE', '<script type="text/javascript">document.write(\'<br /><br />Vous pr&egrave;f&eacute;rez un autre cadeau ?<br /><a href="'.tep_href_link(FILENAME_SHOPPING_CART).'#" onclick="document.getElementById(\\\'popup\\\').style.display = \\\'block\\\'">Cliquez ici !</a>\');</script>');
define('CART_MAX_AMOUNT_REACHED', 'Par mesure de s&eacute;curit&eacute;, le montant maximum d\'une commande est limit&eacute;e &agrave; 300&euro;');

define('FREE_SHIPPING_COST', 'Offert');
define('PROMO_SHIPPING_COST', '
<ul class="promo_nb promo_nb2" id="promo_nb1">
Pour l\'achat de '.NB_GIFT_FOR_3.' parfums :<br />
<span class="text_red">
<li>Un gel douche Hugo Boss offert !</li>
</span>
</ul>');

define('PROMO_GIFT_FOR_3', '<ul class="promo_nb promo_nb3" id="promo_nb1">Ajoutez un article et obtenez un deuxi&egrave;me cadeau suppl&eacute;mentaire</ul>');

define('PROMO_GET_YOUR_GIFT', '
<a href="'.FILENAME_PROMO.'" class="promo_nb promo_nb4" id="promo_nb1">
Choisissez votre cadeau en cliquant ici !
</a>
');

define('MIN_PRODUCTS', '<span class="min_products">Veuillez ajouter un produit dans votre panier afin de pouvoir valider votre commande.</span>');

define('SPECIAL_PROMO', '<br /><b>Tableau des offres en cours :</b><br />
<table cellpadding="2" cellspacing="0" class="special_promo" style="text-align:center;margin:5px 0;width:370px;" align="center" border="1">
<tr class="header" style="font-weight:bold;">
  <td>Nbr produits<br />achet&eacute;s</td><td>Frais de port</td><td>R&egrave;duction<br />imm&eacute;diate</td>
</tr>%s</table>
');

define('SPECIAL_PROMO1', 'Achetez 2 articles et ne payez que 7EUR de frais de port.');
define('SPECIAL_PROMO2', 'Pour 3 produits achet&eacute;s, frais de port offert !');

define('CHOOSE_YOUR_GIFT', 'Choisissez votre cadeau');
define('CHOOSE_YOUR_GIFTS', 'Choisissez vos cadeaux');
define('GIFTS_LEFT', 'restants');
define('CHOOSEN_GIFTS', 'Cadeaux choisis :');
define('CHOOSEN_GIFT', 'Cadeau choisi :');
define('CART_MAX_AMOUNT_BY_PRODUCT_REACHED', 'Vous ne pouvez acheter que '.MAX_SAME_PRODUCTS.' produits identiques maximum.');
?>