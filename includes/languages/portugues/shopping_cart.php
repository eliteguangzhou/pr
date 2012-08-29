<?php
/*
  $Id: shopping_cart.php,v 1.13 2002/04/05 20:24:02 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Conteúdo da Cesta');
define('HEADING_TITLE', 'O que tem em minha cesta?');
define('TABLE_HEADING_REMOVE', 'Retirar da cesta ');
define('TABLE_HEADING_QUANTITY', 'Quantidade');
define('TABLE_HEADING_MODEL', 'Modelo');
define('TABLE_HEADING_PRODUCTS', 'Produto(s)');
define('TABLE_HEADING_TOTAL', 'Valor total');
define('TEXT_CART_EMPTY', 'Sua Cesta de Compras está vazia!');
define('SUB_TITLE_SUB_TOTAL', 'Sub-total:');
define('SUB_TITLE_TOTAL', 'Total:');
define('SUB_TITLE_FRAIS_PORT', 'Taxas de Expedição :');
define('SUB_TITLE_NB_PRODUCTS_DISCOUNT', 'Desconto: :');
define('OUT_OF_STOCK_CANT_CHECKOUT', 'Os produtos marcados com *** não estão disponíveis na quantidade requerida.<br>Modifique a quantidade dos produtos marcados com ***, Obrigado!');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Os produtos marcados com *** não estão disponíveis na quantidade requerida.<br>Entretanto, podemos lhe enviar o que temos disponível imediatamente e o restante assim que disponível.');

define('PROMO_NB', '<ul class="promo_nb promo_nb2" id="promo_nb2">Na compra de <span class="text_red">2 artigos</span> :<li><span class="text_red">frete grátis</span> ! </li><li><span class="text_red">Um gel de banho</span> Hugo Boss oferecido</li></ul>');
define('PROMO_NB1', '<ul class="promo_nb promo_nb%s" id="promo_nb%s">Na compra de <span class="text_red">%s artigos</span> :<li><span class="text_red">%s</span> de desconto ! </li><li><span class="text_red">Um gel de banho</span> Hugo Boss oferecido,</li><li> Um desconto de <span class="text_red">5R$</span> na sua postagem!</li></ul>');
                                                                                                                                                                                                                       
define('STR_GIFT', 'Seu dom oferta');
define('CART_MAX_AMOUNT_REACHED', 'Por segurança, a quantidade máxima de uma ordem é limitado a 300 €');

define('FREE_SHIPPING_COST', 'Oferecidos');
define('PROMO_SHIPPING_COST', '
<ul class="promo_nb promo_nb2" id="promo_nb1">
Para a compra de dois sabores: <br />
<span class="text_red">
<li>Um gel de banho Hugo Boss oferecido!</li>
</span>
</ul>');

?>