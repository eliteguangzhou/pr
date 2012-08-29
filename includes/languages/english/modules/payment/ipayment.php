<?php
/*
  $Id: ipayment.php,v 1.4 2002/11/01 05:35:33 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_IPAYMENT_TEXT_TITLE', 'iPayment');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_DESCRIPTION', 'Credit card number test<br><br>CC# : 4111111111111111<br>Expiration date : Any');
  define('IPAYMENT_ERROR_HEADING', 'There was an error processing your credit card');
  define('IPAYMENT_ERROR_MESSAGE', 'Thank you to verify the information provided !');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_OWNER', 'Card owner :');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_NUMBER', 'Card number :');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_EXPIRES', 'Expiration Date :');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_CHECKNUMBER', 'Control Number:');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_CREDIT_CARD_CHECKNUMBER_LOCATION', 'Number listed on the back of the credit card above the signature)');

  define('MODULE_PAYMENT_IPAYMENT_TEXT_JS_CC_OWNER', '* The name of the owner of the card must have at least ' . CC_OWNER_MIN_LENGTH . '  characters.\n');
  define('MODULE_PAYMENT_IPAYMENT_TEXT_JS_CC_NUMBER', '* The number of the card must have at least ' . CC_NUMBER_MIN_LENGTH . ' characters.\n');
?>