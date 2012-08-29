<?php
/*
  $Id: moneyorder.php,v 1.6 2003/01/24 21:36:04 thomasamoulton Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_MONEYORDER_TEXT_TITLE', '支票/匯票');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', '付給：&nbsp;' . MODULE_PAYMENT_MONEYORDER_PAYTO . '<br><br>寄給：<br>' . nl2br(STORE_NAME_ADDRESS) . '<br><br>' . '款到才能發貨。');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', "付給：". MODULE_PAYMENT_MONEYORDER_PAYTO . "\n\nS寄給：\n" . STORE_NAME_ADDRESS . "\n\n" . '款到才能發貨。');
?>
