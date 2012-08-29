<?php
/*
  $Id: cc.php,v 1.10 2002/11/01 05:14:11 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_CC_TEXT_TITLE', 'Credit Card');
  define('MODULE_PAYMENT_CC_TEXT_DESCRIPTION', '信用卡測試信息：<br><br>CC#: 4111111111111111<br>Expiry: Any');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_TYPE', '卡種：');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_OWNER', '持卡人：');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_NUMBER', '卡號：');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_EXPIRES', '信用卡有效期：');
  define('MODULE_PAYMENT_CC_TEXT_JS_CC_OWNER', '* 持卡人姓名至少應為 ' . CC_OWNER_MIN_LENGTH . ' 個字。\n');
  define('MODULE_PAYMENT_CC_TEXT_JS_CC_NUMBER', '* 信用卡號至少應為 ' . CC_NUMBER_MIN_LENGTH . ' 位數。\n');
  define('MODULE_PAYMENT_CC_TEXT_ERROR', '信用卡錯誤！');
?>