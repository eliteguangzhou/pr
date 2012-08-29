<?php
/*
  $Id: shopping_cart.php,v 1.13 2002/04/05 20:24:02 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce 

  Released under the GNU General Public License 
*/

define('NAVBAR_TITLE', 'Contenuto carrello');
define('HEADING_TITLE', 'Cosa c\'è nel mio carrello?');
define('TABLE_HEADING_REMOVE', 'Cancella');
define('TABLE_HEADING_QUANTITY', 'Quantità');
define('TABLE_HEADING_MODEL', 'Modello');
define('TABLE_HEADING_PRODUCTS', 'Prodotto(i)');
define('TABLE_HEADING_TOTAL', 'Totale');
define('TEXT_CART_EMPTY', 'Il tuo carrello è vuoto!');
define('SUB_TITLE_SUB_TOTAL', 'Sub-Totale:');
define('SUB_TITLE_TOTAL', 'Totale:');
define('SUB_TITLE_FRAIS_PORT', 'Costo di spedizione :');
define('SUB_TITLE_NB_PRODUCTS_DISCOUNT', 'Riduzione :');
define('OUT_OF_STOCK_CANT_CHECKOUT', 'I prodotti contrassegnati con ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' non sono presenti nel nostro magazzino nella quantità desiderata.<br>Cambia la quantità del prodotto contrassegnato con (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Grazie');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'I prodotti contrassegnati con ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' non sono presenti nel nostro magazzino nella quantità desiderata.<br>Puoi acquistare questo prodotto in ogni momento controllando la disponibilità per l\'immediata spedizione nel procedimento di acquisto.');

define('PROMO_NB', '<ul class="promo_nb promo_nb2" id="promo_nb2">Per l\'acquisto di <span class="text_red">2 articoli</span> :<li><span class="text_red">Libero costi di spedizione</span> !</li><li><span class="text_red">Un gel doccia</span> Hugo Boss offerte</li></ul>');
define('PROMO_NB1', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">Per l\'acquisto di <span class="text_red">%s articoli</span> :<li><span class="text_red">%s</span> di sconto offerto,</li><li><span class="text_red">Un gel doccia</span> Hugo Boss offerte,</li><li><span class="text_red">5 euros</span> di sconto sul costo di spedizione !</li></ul>');

define('STR_GIFT', 'Il vostro regalo offerto');
define('STR_GIFT_CHOOSE', '<script type="text/javascript">document.write(\'<br /><br />Si preferisce un regalo diverso?<br /><a href="'.tep_href_link(FILENAME_SHOPPING_CART).'#" onclick="document.getElementById(\\\'popup\\\').style.display = \\\'block\\\'">Clicca qui!</a>\');</script>');
define('CART_MAX_AMOUNT_REACHED', 'Per la sicurezza, l\'importo massimo di un ordine è di 300 €');

define('FREE_SHIPPING_COST', 'Offerte');
define('PROMO_SHIPPING_COST', '
<ul class="promo_nb promo_nb2" id="promo_nb1">
Per l\'acquisto di due articoli: <br />
<span class="text_red">
<li>Un gel doccia Hugo Boss offerte!</li>
</span>
</ul>');

define('MIN_PRODUCTS', '<span class="min_products">Si prega di aggiungere un prodotto nel carrello della spesa, al fine di completare l\'ordine.</span>');

define('SPECIAL_PROMO', '<br /><b>Tabella di offerte in corso:</b><br />
<table cellpadding="2" cellspacing="0" class="special_promo" style="text-align:center;margin:5px 0;" align="center" border="1">
<tr class="header" style="font-weight:bold;">
  <td>Numero di prodotti<br />acquistati</td><td>Spedizione</td><td>Immediata<br />riduzione</td>
</tr>%s</table>
');

define('SPECIAL_PROMO1', 'Acquista 2 articoli e paghi solo 7EUR di spedizione.');
define('SPECIAL_PROMO2', 'Per 3 articoli acquistati, spedizione compresa!');

define('CHOOSE_YOUR_GIFT', 'Scegli il tuo regalo');
define('CHOOSE_YOUR_GIFTS', 'Scegli i tuoi regali');
define('GIFTS_LEFT', 'rimanenti');
define('CHOOSEN_GIFTS', 'Regali selezionati :');
define('CHOOSEN_GIFT', 'Regalo selezionato :');
define('CART_MAX_AMOUNT_BY_PRODUCT_REACHED', 'Si può comprare solo fino a '.MAX_SAME_PRODUCTS.' prodotti identici.');
?>