<?php

define('SPONSORSHIP_TITLE', 'Godchild');
define('SPONSORSHIP_FIRSTNAME', 'First name');
define('SPONSORSHIP_LASTNAME', 'Last name');
define('SPONSORSHIP_EMAIL', 'Email');
define('SPONSORSHIP_SUBSCRIBED', 'Registered');
define('SPONSORSHIP_RETRY', 'Retry');
define('SPONSORSHIP_NO_GODCHILD', 'No godchild');
define('SPONSORSHIP_YES', '<span style="color:green">Yes</span>');
define('SPONSORSHIP_NO', '<span style="color:red">No</span>');

define('SPONSORSHIP_RETRY_LATER', '1 retry by day maximum');

define('SPONSORSHIP_EMAIL_ERROR', 'Some emails to retry are not valid.');

define('SPONSORSHIP_EMAIL_SUBJECT', '%s want to make you discover '.STORE_NAME);

define('SPONSORSHIP_EMAIL_TEXT', 'Mister , Miss

your friend %s has wanted to introduce you to our website <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> and we are very happy for that.

We are happy to give you a %s discount  on one of your orders to start your shopping very quickly on <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>. Benefit from this discount available during 1 month typing this password "%s" during your order.

To integrate the favored members of '.STORE_NAME.', you just have to accept the invitation of %s clicking on the following link :

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php?key=%s&email=%s">http://'.$_SERVER['SERVER_NAME'].'/create_account.php?key=%s&email=%s</a>

We hope to see you soon.
All the team '.STORE_NAME.'. ');

define('SPONSORSHIP_EMAIL_SENT', 'your friends have been pestered by email.');
?>