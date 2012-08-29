<?php
/*
  $Id: shipping_details.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Shipping Details');
define('HEADING_TITLE', 'Shipping Details');

define('TEXT_INFORMATION', '<b>Nós enviamos mundial!</b></p>
<p><b>custo de transporte : </b>
'.$currencies->currencies[$currency]['symbol_left'].round(FLAT_SHIPPING / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</p>
<p><b>Detalhes de entrega :</b>
8 a 12 dias.</p>');
?>