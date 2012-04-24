<?php
/*
  $Id: checkout_success.php,v 1.1.1.1 2002/11/07 03:16:47 nickle Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce
  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', '結帳');
define('NAVBAR_TITLE_2', '完成');

define('HEADING_TITLE', '您的訂單已處理完畢！');

define('TEXT_SUCCESS', '');

define('TEXT_ORDER_NUMBER', ' ');
define('TEXT_TITRE',' ');

define('TEXT_SUCCESS_HIGH', '<b>您的订单已成功<b> 我们再次核实后会发邮件给您再次确认，如果运营正常，我们将在24小时内通过电话确认你运输，<br>您的产品将尽快送达. ');

define('TEXT_SUCCESS_LESS', '谢谢您，您的订单已成功并已付款！您的货物将尽快。请稍后再访问。');


define('TEXT_NOTIFY_PRODUCTS', '下列所選商品若更新時，請通知我：');
define('TEXT_SEE_ORDERS', '要查閱您的訂單紀錄，回到<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'我的帳號\'</a>，並點擊<a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'訂單記錄\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', '有任何疑問，請<a href="' . tep_href_link(FILENAME_CONTACT_US) . '">聯絡我們</a>。');
define('TEXT_THANKS_FOR_SHOPPING', '謝謝您惠顧我們的網上購物商店！');

define('TABLE_HEADING_COMMENTS', '歡迎您留下寶貴的意見或建議');

define('TABLE_HEADING_DOWNLOAD_DATE', '到期日：');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' 下載剩餘。');
define('HEADING_DOWNLOAD', '從這裡下載您的商品：');
define('FOOTER_DOWNLOAD', '您也可以稍後再來\'%s\'下載您的商品');

define('BAD_FRIEND_EMAIL', '无效邮箱地址');

define('MAIL_SENT', '折扣号已通过邮件发送给您！');

define('FRIEND_DISCOUNT_EMAIL_SUBJECT', '%s 提供了一个折扣 '.STORE_NAME);

define('FRIEND_DISCOUNT_EMAIL_TEXT', '您好 ,

您的朋友 %s 希望送一个 %s 折扣券给您 <a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'">'.STORE_NAME.'</a>. 您可以任何订单中使用 : %s

如果您还不是我们 '.STORE_NAME.', 的会员，您可以通过点击如下链接注册 :

<a target="blank" href="http://'.$_SERVER['SERVER_NAME'].'/create_account.php">http://'.$_SERVER['SERVER_NAME'].'/create_account.php</a>
再见
组 '.STORE_NAME.'.'
);
define('ERROR_DISCOUNT_ALREADY_GIVEN', '您已发送折扣券给您的朋友');
?>
