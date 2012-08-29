<?php
/*
  $Id: login.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Login');
define('HEADING_TITLE', 'Welcome, ');

define('HEADING_NEW_CUSTOMER', 'New customer');
define('TEXT_NEW_CUSTOMER', 'You are a new customer on '.STORE_NAME.' ?');
define('TEXT_NEW_CUSTOMER_INTRODUCTION', 'Please, click on "Continue" to create your account. <br /><br />By registering on ' . STORE_NAME . ', you can purchase faster and track your orders.');

define('HEADING_RETURNING_CUSTOMER', 'Already have an account ?');
define('TEXT_RETURNING_CUSTOMER', 'Login to access.  ');

define('TEXT_PASSWORD_FORGOTTEN', 'Forgot your password ? Click here.');

define('TEXT_LOGIN_ERROR_IN_LOGIN', 'Error : This email address isn\'t registered on this website.');
define('TEXT_LOGIN_ERROR_IN_PASSWORD', 'Error : The password doesn\'t match for this email address.');
define('TEXT_VISITORS_CART', '<font color="#ff0000"><b>NOTE :</b></font> The content of your &quot;visitor\'s cart&quot; will be merged with your &quot;member\'s cart&quot; once you have logged on <a href="javascript:session_win();">[More info]</a>');

define('FROM_SPONSORSHIP', 'To take advantage of the sponsorship system, you must authenticate.

2 good reasons to sponsorize your friends !

1. It\'s easy !
To sponsorize your friends, you just need to enter their email adress in the fields below. An email will be sent to inform them about your invitation.

2. It makes you earn money!
'.STORE_NAME.' offers you an exceptional remuneration declined on three levels to make you earn money:

- %s on %s first orders of your direct referrals
- %s on %s first orders of referrals of your referrals
- %s on %s first orders of referrals of your referrals of your referrals
');
define('TEXT_LOGIN_ERROR_BLOCK','Your account has been blocked. Please contact customer service.');
?>
