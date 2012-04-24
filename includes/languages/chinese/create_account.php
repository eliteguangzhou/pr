<?php
/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', '開設帳號');

define('HEADING_TITLE', '我的帳號資料');
define('EMAIL_GREET_MR', '親愛的%s先生,' . "\n\n");
define('EMAIL_GREET_MS', '親愛的%s女士,' . "\n\n");
define('EMAIL_GREET_NONE', '親愛的%s,' . "\n\n");

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>注意：</b></font></small> 如果您已有賬號, 請從<a href="%s"><u>這裡</u></a>登錄');

define('EMAIL_SUBJECT', '歡迎光臨  ' . STORE_NAME ); // . STORE_NAME);

define('EMAIL_WELCOME', '
恭喜您！您的个人帐户已经建立。<br>

现在您可以点击“加入架购车”购买我们的香水。

进入您的帐户的信息如下 :

用户名: vloggin
密码: vpass'. "\n\n");

define('EMAIL_TEXT', '');
define('EMAIL_CONTACT', '如需帮助，请通过邮箱联系我们 <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'" target="_blank">'.STORE_OWNER_EMAIL_ADDRESS.'</a> .

 访问愉快,

  SAMY
  客户中心组
  <a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');
  
define('EMAIL_PRESENTATION', '');
//define('EMAIL_LOGIN', 'Username: %s <br>' . "\n\n");
//define('EMAIL_PWD', 'Password: %s <br>' . "\n\n");


define('EMAIL_CONTACT', '如果您还需要帮助，请将详情通过邮件发送给我们，我们会在24-48小时内邮件回复
<br><br>
您可以发送邮件到 : contact@parfumwholesale.com
<br><br>
我们期待与您建立一种双赢及长期的关系!
<br><br>
致敬
<br><br>
Mike Hilton<br>
迈克 希乐顿
<br><br>
' . "\n\n");
//define('EMAIL_CONTACT', 'For help with any of our online services, please email the store-owner: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>注意：</b>這個電子郵件地址是由我們的客戶提供的，如果您並沒有註冊，請來信： mailto:' . STORE_OWNER_EMAIL_ADDRESS . "。\n");

define('ENTRY_EMAIL_ADDRESS_SPONSORSHIP_ERROR', '赠与地址与您之前的地址不一致.');

define('SPONSORSHIP_GODFATHER', '您的保荐人是: ');
define('SPONSORSHIP_GODFATHER_UNKNOWN', '保荐人的答案和输入的邮箱地址不匹配');

define('EMAIL_SUBJECT_NETA', 'Réductions '.STORE_NAME);
define('EMAIL_TEXT_NETA', 'Suite à votre inscription sur '.STORE_NAME.', profitez des coupons de réduction suivants (non cumulable) :

%s

Bonne visite,

SAMY
Equipe Service Client
<a href="http://www.'.strtolower(STORE_NAME).'/" target="_blank">www.'.strtolower(STORE_NAME).'</a>');

?>