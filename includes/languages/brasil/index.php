<?php
/*
  $Id: index.php,v 1.1 2003/06/11 17:38:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TABLE_HEADING_NEW_PRODUCTS', 'Novos Produtos em %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Produto em alta');
define('TABLE_HEADING_DATE_EXPECTED', 'Data Esperada');
define('TEXT_MAIN', '');

if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', 'Produtos');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Modelo');
  define('TABLE_HEADING_PRODUCTS', 'Nome do Produto');
  define('TABLE_HEADING_MANUFACTURER', 'Manufacturer');
  define('TABLE_HEADING_QUANTITY', 'Quantidade');
  define('TABLE_HEADING_PRICE', 'Preço');
  define('TABLE_HEADING_WEIGHT', 'Peso');
  define('TABLE_HEADING_BUY_NOW', 'Comprar agora');
  define('TEXT_NO_PRODUCTS', 'Não há nenhum produto a listar nesta categoria .');
  define('TEXT_NO_PRODUCTS2', 'Não há nenhum produto disponível deste fabricante');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Número dos produtos: ');
  define('TEXT_SHOW', '<b>Mostrar:</b>');
  define('TEXT_BUY', 'Compra 1 \'');
  define('TEXT_NOW', '\' agora');
  define('TEXT_ALL_CATEGORIES', 'Todas as Categorias');
  define('TEXT_ALL_MANUFACTURERS', 'Todos os fabricantes ');
  define('TEXT_PRICE_FROM', 'à partir de');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Descubra ...');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Categorias');
}




define('NEW_INTRO','
Bem-vindo ao Reino dos segredos do perfume, a preços baixos!

Dê um passeio na fragrância marcas <span class="text_rose">o menos caro em França!</span>
Não compre sem comparar !<span class="text_rose"> Nós devolveremos a diferença!</span>

« <a class="text_rose" href="'.tep_href_link(FILENAME_ADVANTAGES).'">Descubra os nossos benefícios</a> »

- <span class="text_rose">20.000 perfumes e cosméticos</span>atualmente no site
- 500 marcas era -40%, -50%, -70%
- 3€, 8€, <span class="text_rose">Desconto de 15 €</span>  oferecidos
- <span class="text_rose">Frete 3€</span>  a partir de 2 produtos na cestar
- 1 dom <span class="text_rose">HUGO BOSS oferecidos</span>  a partir de 2 produtos na cesta
- Todos os produtos on-line estão em <span class="text_rose">estoque</span>
- <span class="text_rose"> Satisfeito ou reembolsado</span> 30 dias
- Pagamento <span class="text_rose">seguro</span>
- Atendimento ao Cliente: <span class="text_rose">0970 465 068</span> (6 dias / 7)');

?>