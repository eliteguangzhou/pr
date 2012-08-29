<?php
/*
  $Id: login.php,v 1.1.1.1 2002/11/07 03:16:47 nickle Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
define('NAVBAR_TITLE', '登錄');
define('HEADING_TITLE', '歡迎您，請登錄');

define('HEADING_NEW_CUSTOMER', '新顧客');
define('TEXT_NEW_CUSTOMER', '我是新顧客。');
define('TEXT_NEW_CUSTOMER_INTRODUCTION', '成為'. STORE_NAME .'的會員，可以讓您購物時更加便利，及時瞭解訂單狀態，也可以隨時查閱您的購物記錄。');

define('HEADING_RETURNING_CUSTOMER', '老顧客');
define('TEXT_RETURNING_CUSTOMER', '我是老顧客。');

define('TEXT_PASSWORD_FORGOTTEN', '密碼忘記了? 請按這裡。');

define('TEXT_LOGIN_ERROR', '<b>錯誤：</b>\'電子郵件地址\' 或 \'密碼\'不對。');
define('TEXT_LOGIN_ERROR_IN_LOGIN', '该邮箱地址没有在我们的网站上注册过。');
define('TEXT_LOGIN_ERROR_IN_PASSWORD', '密码不符');
define('TEXT_VISITORS_CART', '<font color="#ff0000"><b>注意：</b></font>你在&quot;訪客購物車&quot;裡的商品，會在登錄後自動併入&quot;會員購物車&quot;內 <a href="javascript:session_win();">[更多資料]</a>');

define('FROM_SPONSORSHIP', '您需要认证后才可以充分利用赞助体系。

2 2 引荐您朋友的理由!

1. 很简单 !
引荐您的朋友，您只需在如下地方填写他们的邮箱地址，然后系统会把您的邀请发送给他们。

2. 这可让您赚到外快!
'.STORE_NAME.' 可让您赚到如下三种等级的外快

- %s on %s first orders of your direct referrals
- %s on %s first orders of referrals of your referrals
- %s on %s first orders of referrals of your referrals of your referrals

<img src="images/parrain_schema.gif" />');
?>
