<?php
define('FRIEND_DISCOUNT_TITLE', 'Discount coupons for 3 of your friends!');
define('FRIEND_DISCOUNT_INTRO', 'You can chare of a coupon for a value of % s entering their emails in the following fields:<br />');
define('ERROR_BAD_ORDER', 'Command invalid or already processed');
define('ERROR_BAD_FRIEND_EMAIL', 'Invalid email');
define('ERROR_ALREADY_FRIEND_EMAIL', 'This friend has already benefited from a reduction for this order');
define('ERROR_MAX_FRIENDS', 'You have reached the maximum number of cuts allowed for this command');
define('ERROR_DISCOUNT_ALREADY_GIVEN', 'You have already sent a coupon for that (you) friend (e) before');
define('ERROR_MAX_FRIENDS_REACHED', 'You have exceeded the maximum number of cuts allowed for this command (%s remaining)');
define('MAIL_SENT', 'An email has been sent to your contacts with the discount code!');


define('FRIEND_DISCOUNT_EMAIL_SUBJECT', '%s offers you a coupon '.STORE_NAME);

define('FRIEND_DISCOUNT_EMAIL_TEXT', 'Hello ,

Your friend %s ants to offer you a %s discount on account of one of your orders <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>. Take advantage of this discount, valid for 48 hours after entering the code "%s" when ordering.

If you are not yet into the privileged circle of members '.STORE_NAME.' You can now register by clicking on the link below:

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php">http://'.$_SERVER['SERVER_NAME'].'/create_account.php</a>

See you soon 
The Team '.STORE_NAME.'. ');

?>