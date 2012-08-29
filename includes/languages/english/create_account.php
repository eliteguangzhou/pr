<?php
/*
  $Id: create_account.php,v 1.11 2003/07/05 13:58:31 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Créer un compte');

define('HEADING_TITLE', 'Information de mon compte');


define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>REMARQUE:</b></small></font> Si vous avez déjà un compte chez nous, veuillez vous connecter à la page d\'<a href="%s"><u>ouverture de session</u></a>.');

define('EMAIL_SUBJECT', 'Welcome to ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Dear Mr. vnom,' . "\n\n");
define('EMAIL_GREET_MS', 'Dear Ms. vnom,' . "\n\n");
define('EMAIL_GREET_NONE', 'Dear vnom' . "\n\n");

define('EMAIL_WELCOME', '
Congratulations! Your personal account is now established.

You can now buy our perfumes by clicking on "add to cart"

The information to access your account are as follows:

User: vloggin
Password: vpass'. "\n\n");

define('EMAIL_TEXT', '');
define('EMAIL_CONTACT', 'If you need help, please contact us at: <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'" target="_blank">'.STORE_OWNER_EMAIL_ADDRESS.'</a>.

  Enjoy your visit,

  SAMY
  Costumer service department
  <a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');
  
define('EMAIL_WARNING', '<b><u>IMPORTANT NOTE:</u></b>You are receiving this email because it follows the inclusion of a new customer in our online store. If you do you\'re not on ' . STORE_NAME . ', Thank you for the report to the manager of the shop at this address: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");

define('ENTRY_EMAIL_ADDRESS_SPONSORSHIP_ERROR', 'The address of sponsorship is different from the one you entered.');

define('SPONSORSHIP_GODFATHER', 'Your sponsor is: ');
define('SPONSORSHIP_GODFATHER_UNKNOWN', 'The key and the email entered did not match any sponsorship.');

define('EMAIL_SUBJECT_NETA', 'Réductions '.STORE_NAME);
define('EMAIL_TEXT_NETA', 'Suite à votre inscription sur '.STORE_NAME.', profitez des coupons de réduction suivants (non cumulable) :

%s

Bonne visite,

SAMY
Equipe Service Client
<a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');
?>
