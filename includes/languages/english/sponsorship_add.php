<?php
define('SPONSORSHIP_INTRODUCTION_TEXT', '2 good reasons to sponsor your friends !

1. It\'s simple !
To sponsor your friends, you just have to enter their email address<sup>(1)</sup> in the fields below. An email will be sent to inform them about your invitation.

2. It makes you earn money !
'.STORE_NAME.' offers you an exceptional remuneration declined on three levels to make you earn money<sup>(2)</sup> :

- %s on the %s first orders of your direct sponsoreds 
- %s on the %s first orders of the sponsoreds of your sponsoreds
- %s on the %s first orders of the sponsored of the sponsored of your sponsoreds

You can sponsor until 100 sponsoreds and win until 700 $ of promotional credit on your direct sponsored so more with the sponsoreds of your sponsoreds etc.
Restart the space through "Sponsorship" in your account to multiply your winnings!

Register quickly at '.STORE_NAME.' to benefit from the sponsorship program to earn money !

<i><sup>(1)</sup> : Email they will have to use during their registration at '.STORE_NAME.'
<sup>(2)</sup> : the gains you have realised will be emitted via 1 year reduction codes '.STORE_NAME.'
</i>');

define('SPONSORSHIP_TYPE_EMAILS', 'type emails of the friends you want to sponsor :');
define('SPONSORSHIP_SUBMIT_BUTTON', 'Sponsor');

define('ENTRY_QUOTA_GODCHILD', 'You have exceeded your quota of sponsoreds (%s remainings(s))');

define('ENTRY_EMAIL_ERROR', 'The following email is not valid : <br />- %s');
define('ENTRY_EMAIL_ERRORS', 'The following emails are not valid : <br />- %s');

define('ENTRY_STORED_EMAIL_ERROR', 'The following email is already one of our clients '.STORE_NAME.' : <br />- %s');
define('ENTRY_STORED_EMAIL_ERRORS', 'The following email are already clients '.STORE_NAME.' : <br />- %s');

define('ENTRY_SPONSORED_EMAIL_ERROR', 'The following email is pending to be sponsored : <br />- %s');
define('ENTRY_SPONSORED_EMAIL_ERRORS', 'The following emails are pending to be sponsored : <br />- %s');
define('SPONSORSHIP_TITLE', 'Sponsor a friend');

define('SPONSORSHIP_EMAIL_SUBJECT', '%s wants to make you discover '.STORE_NAME);

define('SPONSORSHIP_EMAIL_TEXT', 'Hello,
Your friend %s has wanted to make you discover our website <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a> and we are very happy for that.

We are glad to offer you a %s discount on one of your orders to immediatly start your shopping on <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>. Benefit from this discount available during one month typing the following code "%s" during your order.

To integrate the favored members of '.STORE_NAME.', you just have to accept the invitation of %s clicking on the following link :

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php?key=%s&email=%s">http://'.$_SERVER['SERVER_NAME'].'/create_account.php?key=%s&email=%s</a>

We hope to see you soon
All the team '.STORE_NAME.'. ');

define('SPONSORSHIP_EMAIL_SENT', 'Congratulations !

your friends have been pestered by email.

You will benefit from reduction coupon when they do their first buy, plus when their sponsored and the sponsored of them buy ! These reductions coupons will be sent to you by email and will be accesible on this link:

<a href="http://'.$_SERVER['SERVER_NAME'].'/sponsorship_discount.php">My reductions</a>

You can show the tracking of your sponsorings clicking on the following link :

<a href="http://'.$_SERVER['SERVER_NAME'].'/sponsorship_list.php">My sponsoreds</a>

Kind regards,
All the team '.STORE_NAME);

define('EMAIL_ADDRESS_NUMBER', 'Email address');
?>