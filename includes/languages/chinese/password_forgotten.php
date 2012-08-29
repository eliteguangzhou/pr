<?php
/*
  $Id: password_forgotten.php,v 1.1.1.1 2002/11/07 03:16:48 nickle Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce
  Released under the GNU General Public License

 

*/

define('NAVBAR_TITLE_1', '登錄');
define('NAVBAR_TITLE_2', '忘記密碼');
define('HEADING_TITLE', '我忘記密碼了！');
/*
define('ENTRY_EMAIL_ADDRESS', '電子郵件：');
*/
define('TEXT_MAIN', '您如果忘了密碼，請輸入您的電子郵件地址，我們會把您的新密碼用電子郵件寄給您。');


define('TEXT_NO_EMAIL_ADDRESS_FOUND', '錯誤：這個電子郵件地址沒有在我們這裡註冊，請再試一次。');
define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - 新密碼');
define('EMAIL_PASSWORD_REMINDER_BODY', '您從' . $REMOTE_ADDR . '要求補發新密碼。' . "\n\n" . '您在\'' . STORE_NAME . '\' 的新密碼是：' . "\n\n" . '   %s' . "\n\n");
define('SUCCESS_PASSWORD_SENT', '新的密碼已經寄到您的電子郵件地址');
?>