<?php
/*
  $Id: shopping_cart.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Warenkorb');
define('HEADING_TITLE', 'Ihr Warenkorb enth&auml;lt :');
define('TABLE_HEADING_REMOVE', 'Entfernen');
define('TABLE_HEADING_QUANTITY', 'Anzahl');
define('TABLE_HEADING_MODEL', 'Artikelnr.');
define('TABLE_HEADING_PRODUCTS', 'Artikel');
define('TABLE_HEADING_TOTAL', 'Summe');
define('TEXT_CART_EMPTY', 'Sie haben noch nichts in Ihrem Warenkorb.');
define('SUB_TITLE_SUB_TOTAL', 'Zwischensumme:');
define('SUB_TITLE_TOTAL', 'Summe:');
define('SUB_TITLE_FRAIS_PORT', 'Versand :');
define('SUB_TITLE_NB_PRODUCTS_DISCOUNT', 'Ermäßigung:');
define('OUT_OF_STOCK_CANT_CHECKOUT', 'Die mit ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' markierten Produkte, sind leider nicht in der von Ihnen gew&uuml;nschten Menge auf Lager.<br>Bitte reduzieren Sie Ihre Bestellmenge f&uuml;r die gekennzeichneten Produkte, vielen Dank');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Die mit ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' markierten Produkte, sind leider nicht in der von Ihnen gew&uuml;nschten Menge auf Lager.<br>Die bestellte Menge wird kurzfristig von uns geliefert, wenn Sie es w&uuml;nschen nehmen wir auch eine Teillieferung vor.');

define('PROMO_NB', '<ul class="promo_nb promo_nb2" id="promo_nb2">Beim Kauf von <span class="text_red">2 Produkten</span> :<li><span class="text_red">Kostenloser Versand</span> !</li><li><span class="text_red">Duschgel</span> Hugo Boss angeboten,</li></ul>');
define('PROMO_NB1', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">Beim Kauf von <span class="text_red">%s Produkten</span> :<li><span class="text_red">%s</span> Rabatt angeboten,</li><li><span class="text_red">Duschgel</span> Hugo Boss angeboten,</li><li><span class="text_red">5 euros</span> Rabatt auf ihren Versand !</li></ul>');

define('STR_GIFT', 'Ihr Geschenk');
define('STR_GIFT_CHOOSE', '<script type="text/javascript">document.write(\'<br /><br />Sie bevorzugen ein anderes Geschenk?<br /><a href="'.tep_href_link(FILENAME_SHOPPING_CART).'#" onclick="document.getElementById(\\\'popup\\\').style.display = \\\'block\\\'">Klicken Sie hier!</a>\');</script>');
define('CART_MAX_AMOUNT_REACHED', 'Aus Sicherheitsgründen ist der maximale Betrag einer Bestellung bis 300 € begrenzt');

define('FREE_SHIPPING_COST', 'Bot');
define('PROMO_SHIPPING_COST', '
<ul class="promo_nb promo_nb2" id="promo_nb1">
Für den Kauf von zwei Produkten: <br />
<span class="text_red">
<li>Ein Duschgel Hugo Boss angeboten!</li>
</span>
</ul>');

define('MIN_PRODUCTS', '<span class="min_products">Bitte fügen Sie ein Produkt in Ihrem Warenkorb, um Ihre Bestellung abzuschließen.</span>');

define('SPECIAL_PROMO', '<br /><b>Tabelle der aktuellen Angebote:</b><br />
<table cellpadding="2" cellspacing="0" class="special_promo" style="text-align:center;margin:5px 0;" align="center" border="1">
<tr class="header" style="font-weight:bold;">
  <td>Anzahl der gekauften<br />Produkte</td><td>Versand</td><td>Sofortige<br />Reduktion</td>
</tr>%s</table>
');

define('SPECIAL_PROMO1', 'Kaufen Sie 2 Artikel und bezahle nur 7EUR Porto.');
define('SPECIAL_PROMO2', 'Für 3 gekaufte Artikel, inklusive Versand!');

define('CHOOSE_YOUR_GIFT', 'Wählen Sie Ihr Geschenk');
define('CHOOSE_YOUR_GIFTS', 'Wählen Sie Ihre Geschenke');
define('GIFTS_LEFT', 'verbleibenden');
define('CHOOSEN_GIFTS', 'Geschenke ausgewählt :');
define('CHOOSEN_GIFT', 'Ausgewählt Geschenk :');
define('CART_MAX_AMOUNT_BY_PRODUCT_REACHED', 'Sie können nur kaufen bis zu '.MAX_SAME_PRODUCTS.' identische Produkte.');
?>