<?php
/*
  $Id: checkout_success.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Checkout');
define('NAVBAR_TITLE_2', 'Success');

define('HEADING_TITLE', '<b>Your order has been successfully processed!</b><br><br> We will review it and a sale\'s manager will contact you to confirm your order.<br><br> 
If all looks good, your products will arrive at their destination within  7 - 12 business days.<br /><br />
<p>
An order confirmation has been sent to your email inbox. If you have not received anything within 10 minutes you can access your order confirmation with this link:
</p>
<br /><br /> 

  <p>
  An order confirmation has been sent to your email inbox. If you have not received anything within 10 minutes you can access your order confirmation with this link:<br />
  <a href="http://'.$_SERVER['SERVER_NAME'].'/account_history_info.php?order_id=%s">http://'.$_SERVER['SERVER_NAME'].'/account_history_info.php?order_id=%s</a>
  </p>
<br />');

define('HEADING_TITLE2', '<br />
  <p><b>
  You can also enjoy a discount of %s by entering their email in the following fields</b><br />
  <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
  <table cellpadding="0" cellspacing="5" style="width:220px;">
  <tr><td>Email Adress 1 : <input type="text" name="email[]" value="%s" /></td></tr>
  <tr><td>Email Adress 2 : <input type="text" name="email[]" value="%s" /></td></tr>
  <tr><td>Email Adress 3 : <input type="text" name="email[]" value="%s" /></td></tr>
  <tr><td align="center">'.tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE).'</td></tr>
  </table>
  </form>
  </p>');

define('TEXT_SUCCESS', '');
                                            
define('TEXT_ORDER_NUMBER', ' ');
define('TEXT_TITRE',' ');

define('TEXT_SUCCESS_HIGH', '<b>Your order was successful sent !<b> We will review it and send you an email to confirm the order. If all looks good, we will then contact you within 24
 hours by phone to confirm your shipment.<br>Your goods will be dispached as soon as possible. ');

define('TEXT_SUCCESS_LESS', 'Thank you, your order was successful and payment has been made! Your goods will be dispached as soon as possible. Please visit again soon.');

define('TEXT_NOTIFY_PRODUCTS', 'Please notify me of updates to the products I have selected below:');
define('TEXT_SEE_ORDERS', 'You can view your order history by going to the <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'My Account\'</a> page and by clicking on <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'History\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Please direct any questions you have to the <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">store owner</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Thanks for shopping with us online!<br>');

define('TABLE_HEADING_COMMENTS', 'Enter a comment for the order processed');

define('TABLE_HEADING_DOWNLOAD_DATE', 'Expiry date: ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' downloads remaining');
define('HEADING_DOWNLOAD', 'Download your products here:');
define('FOOTER_DOWNLOAD', 'You can also download your products at a later time at \'%s\'');

define('BAD_FRIEND_EMAIL', 'Invalid Email');

define('MAIL_SENT', 'An Email has been sent to your contacts with the Discount number !');

define('FRIEND_DISCOUNT_EMAIL_SUBJECT', '%s offers a discount '.STORE_NAME);

define('FRIEND_DISCOUNT_EMAIL_TEXT', 'Bonjour ,

Votre ami(e) %s wishes to offer you a %s discount to use on one of your orders <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>. Enjoy this 48h vailable discount by entering the following code "%s" when ordering.

If you are not yet party to the privileged circle of members of '.STORE_NAME.', You can now register by clicking the following link :

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php">http://'.$_SERVER['SERVER_NAME'].'/create_account.php</a>

See you soon.
The Team '.STORE_NAME.'.'
);
define('ERROR_DISCOUNT_ALREADY_GIVEN', 'You have sent a discount to your friend already');



?>