<?php
/*
  $Id: authorizenet.php,v 1.13 2003/01/03 17:25:43 thomasamoulton Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TITLE', 'Authorize.net');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION', '信用卡測試信息：<br><br>CC#: 4111111111111111<br>Expiry: Any');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TYPE', '卡種：');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_OWNER', '持卡人：');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_NUMBER', '卡號：');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_EXPIRES', '信用卡有效期：');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_OWNER', '* 持卡人姓名至少應為 ' . CC_OWNER_MIN_LENGTH . ' 個字。\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_NUMBER', '* 信用卡號至少應為 ' . CC_NUMBER_MIN_LENGTH . ' 位數。\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR_MESSAGE', '你輸入的信用卡信息有誤，請再試一次。');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DECLINED_MESSAGE', '你的信用卡被拒絕。請試另一張卡或與銀行聯繫。');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR', '信用卡錯誤！');
?>
