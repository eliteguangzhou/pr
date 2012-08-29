<?php
/*
  $Id: specials.php,v 1.7 2002/11/19 01:48:08 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
$tmp = array(
'Mon' => 'Monday',
'Tue' => 'Tuesday',
'Wed' => 'Wednesday',
'Thu' => 'Thursday',
'Fri' => 'Friday',
'Sat' => 'Saturday',
'Sun' => 'Sunday',
);
$tmp = $tmp[date('D')];
define('NAVBAR_TITLE', 'Promotion of the '.$tmp);
define('HEADING_TITLE', 'Promotion of the '.$tmp.' !');
?>