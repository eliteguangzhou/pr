<?php
/*
  $Id: shipping_details.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Shipping details');
define('HEADING_TITLE', 'Shipping details');

define('TEXT_INFORMATION', '<b>We ship worldwide!</b></p>
<p><b>Transportation cost:  </b>
'.$currencies->currencies[$currency]['symbol_left'].round(FLAT_SHIPPING / $currencies->currencies["EUR"]['value'] * $currencies->currencies[$currency]['value']).$currencies->currencies[$currency]['symbol_right'].'</p>
<p><b>Delivery</b>
8-12 days.</p>');
?>