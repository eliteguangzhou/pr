<?php
/*
  $Id: ipayment.php,v 1.4 2002/11/01 05:35:33 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_IPAYMENT_TEXT_TITLE', 'iPayment');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_DESCRIPTION', '信用卡測試信息：<br><br>CC#: 4111111111111111<br>Expiry: Any');
  define('IPAYMENT_ERROR_HEADING', '你輸入的信用卡信息有誤。');
  define('IPAYMENT_ERROR_MESSAGE', '請檢查你輸入的信用卡信息！');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_OWNER', '持卡人：');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_NUMBER', '卡號：');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_EXPIRES', '信用卡有效期：');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_CHECKNUMBER', '信用卡安全號碼：');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_CHECKNUMBER_LOCATION', '(位於信用卡的背面)');

  define('MODULE_PAYMENT_IPAYMENT_TEXT_JS_CC_OWNER', '* 持卡人姓名至少應為 ' . CC_OWNER_MIN_LENGTH . ' 個字。\n');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_JS_CC_NUMBER', '* 信用卡號至少應為 ' . CC_NUMBER_MIN_LENGTH . ' 位數。\n');
?>