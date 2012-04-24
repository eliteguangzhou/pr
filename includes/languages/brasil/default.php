<?php
/*
  $Id: default.php,v 1.14 2002/01/01 17:26:00 dgw_ Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 'Seja Bem Vindo(a) a nossa loja virtual');
define('TABLE_HEADING_NEW_PRODUCTS', 'Novos produtos em %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Novidades');
define('TABLE_HEADING_DATE_EXPECTED', 'Lançamentos');

if ($category_depth == 'products' || $HTTP_GET_VARS['manufacturers_id']) {
  define('HEADING_TITLE', 'Seja bem vindo a nossa loja');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Modelo');
  define('TABLE_HEADING_PRODUCTS', 'Produtos');
  define('TABLE_HEADING_MANUFACTURER', 'Fabricante');
  define('TABLE_HEADING_QUANTITY', 'Quantidade');
  define('TABLE_HEADING_PRICE', 'Preço');
  define('TABLE_HEADING_WEIGHT', 'Peso');
  define('TABLE_HEADING_BUY_NOW', 'Compre Agora');
  define('TEXT_NO_PRODUCTS', 'Não há produtos nesta categoria.');
  define('TEXT_NO_PRODUCTS2', 'Não há produtos deste fabricante.');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Número de Produtos: ');
  define('TEXT_SHOW', '<b>Exibir:</b>');
  define('TEXT_BUY', 'Compre 1 \'');
  define('TEXT_NOW', '\' agora');
  define('TEXT_ALL', 'All');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Veja nossas novidades');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Categorias');
}
?>