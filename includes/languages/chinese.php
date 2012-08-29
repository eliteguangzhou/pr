<?php
/*
  $Id: tchinese.php,v 1.1.1.1 2002/11/07 03:16:47 nickle Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce
  Released under the GNU General Public License

*/

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat try 'en_US'
// on FreeBSD try 'en_US.ISO_8859-1'
// on Windows try 'en', or 'English'
 @setlocale(LC_TIME, '');
define('DATE_FORMAT_SHORT', '%m/%d%/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%Y年%m月%d日'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
define('LANGUAGE_CURRENCY', 'TWD');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="tw"');

// charset for web pages and emails
define('CHARSET', 'UTF-8');

// page title
define('TITLE', STORE_NAME);

// header text in includes/header.php
define('HEADER_TITLE_CREATE_ACCOUNT', '開設帳號');
define('HEADER_TITLE_MY_ACCOUNT', '我的帳號');
define('HEADER_TITLE_CART_CONTENTS', '購物車');
define('HEADER_TITLE_CHECKOUT', '結帳');
define('HEADER_TITLE_CONTACT_US', '聯絡我們');
define('HEADER_TITLE_TOP', '首頁');
define('HEADER_TITLE_CATALOG', '商品目錄');
define('HEADER_TITLE_LOGOFF', '退出');
define('HEADER_TITLE_LOGIN', '登錄');
define('HEADER_NEW_DISCOUNT', '<a href="'.tep_href_link('sponsorship_discount.php').'" id="new_discount">新的折扣碼！點擊這裡！</a>');
define('HEADER_NEW_DISCOUNTS', '<a href="'.tep_href_link('sponsorship_discount.php').'" id="new_discount">新的折扣碼！點擊這裡！</a>');
define('HEADER_TITLE_MENTIONS_LEGALES', '法律');

// footer text in includes/footer.php
define('FOOTER_TEXT_REQUESTS_SINCE', '次瀏覽，自從');

// text for gender
define('MALE', '男');
define('FEMALE', '女');
define('MALE_ADDRESS', '先生');
define('FEMALE_ADDRESS', '小姐');

// text for date of birth example
define('DOB_FORMAT_STRING', 'mm/dd/yyyy');
//define('DOB_FORMAT_STRING', 'yyyy/mm/dd');

// categories box text in includes/boxes/categories.php
define('BOX_HEADING_CATEGORIES', '商品分類');

// manufacturers box text in includes/boxes/manufacturers.php
define('BOX_HEADING_MANUFACTURERS', '製造商');

// whats_new box text in includes/boxes/whats_new.php
define('BOX_HEADING_WHATS_NEW', '新到商品');

// quick_find box text in includes/boxes/quick_find.php
define('BOX_HEADING_SEARCH', '快速搜尋商品');
define('BOX_SEARCH_TEXT', '用關鍵字搜尋商品');
define('BOX_SEARCH_ADVANCED_SEARCH', '高級搜尋');

// specials box text in includes/boxes/specials.php
define('BOX_HEADING_SPECIALS', '特價商品');

// reviews box text in includes/boxes/reviews.php
define('BOX_HEADING_REVIEWS', '商品評論');
define('BOX_REVIEWS_WRITE_REVIEW', '請您對這個商品發表評論!');
define('BOX_REVIEWS_NO_REVIEWS', '目前沒有任何商品評論');
define('BOX_REVIEWS_TEXT_OF_5_STARS', '%s 顆星（最好為5顆星）');

// shopping_cart box text in includes/boxes/shopping_cart.php
define('BOX_HEADING_SHOPPING_CART', '購物車');
define('BOX_SHOPPING_CART_EMPTY', '您的購物車是空的');

// order_history box text in includes/boxes/order_history.php
define('BOX_HEADING_CUSTOMER_ORDERS', '購物紀錄');

// best_sellers box text in includes/boxes/best_sellers.php
define('BOX_HEADING_BESTSELLERS', '最暢銷商品');
define('BOX_HEADING_BESTSELLERS_IN', '最暢銷商品在<br>&nbsp;&nbsp;');

// notifications box text in includes/boxes/products_notifications.php
define('BOX_HEADING_NOTIFICATIONS', '商品通知');
define('BOX_NOTIFICATIONS_NOTIFY', '<b>%s</b><br>更新時請通知我');
define('BOX_NOTIFICATIONS_NOTIFY_REMOVE', '<b>%s</b><br>更新時不必通知我');

// manufacturer box text
define('BOX_HEADING_MANUFACTURER_INFO', '製造商資料');
define('BOX_MANUFACTURER_INFO_HOMEPAGE', '%s的網頁');
define('BOX_MANUFACTURER_INFO_OTHER_PRODUCTS', '製造商的其他產品');

// languages box text in includes/boxes/languages.php
define('BOX_HEADING_LANGUAGES', '語言');

// currencies box text in includes/boxes/currencies.php
define('BOX_HEADING_CURRENCIES', '貨幣');

// information box text in includes/boxes/information.php
define('BOX_HEADING_INFORMATION', '服務台');
define('BOX_INFORMATION_PRIVACY', '隱私權保護聲明');
define('BOX_INFORMATION_CONDITIONS', '顧客須知');
define('BOX_INFORMATION_SHIPPING', '送貨與退貨');
define('BOX_INFORMATION_CONTACT', '聯絡我們');
define('BOX_INFORMATION_RETURNS', '返回');
define('BOX_INFORMATION_CANCEL', '撤销订单');
define('BOX_INFORMATION_TRACK', '跟踪您的订单');
define('BOX_INFORMATION_ABOUT_US', '关于我们');
define('BOX_INFORMATION_FAQ', 'FAQ');

// tell a friend box text in includes/boxes/tell_a_friend.php
define('BOX_HEADING_TELL_A_FRIEND', '告訴朋友');
define('BOX_TELL_A_FRIEND_TEXT', '向朋友推薦這個商品');

// checkout procedure text
define('CHECKOUT_BAR_DELIVERY', '送貨資料');
define('CHECKOUT_BAR_PAYMENT', '付款資料');
define('CHECKOUT_BAR_CONFIRMATION', '確認');
define('CHECKOUT_BAR_FINISHED', '完成！');

// pull down default text
define('PULL_DOWN_DEFAULT', '請選擇');
define('TYPE_BELOW', '寫在下方');

// javascript messages
define('JS_ERROR', '您的表格在處理中發現錯誤.\n\n請作以下修改:\n\n');

define('JS_REVIEW_TEXT', '* 你的評論最少要 ' . REVIEW_TEXT_MIN_LENGTH . ' 個字。\n');
define('JS_REVIEW_RATING', '* 你必須給這個商品打分。\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* 請選一種付款方式。\n');

define('JS_ERROR_SUBMITTED', '這個表格已送出，請按 Ok 後等待處理。');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', '請選一種付款方式。');

define('CATEGORY_COMPANY', '公司資料');
define('CATEGORY_PERSONAL', '個人資料');
define('CATEGORY_ADDRESS', '你的地址');
define('CATEGORY_CONTACT', '聯絡方式');
define('CATEGORY_OPTIONS', '選項');
define('CATEGORY_PASSWORD', '你的密碼');

define('ENTRY_COMPANY', '公司名稱：');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', '性別：');
define('ENTRY_GENDER_ERROR', '請選擇您的性別。');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', '名：');
define('ENTRY_FIRST_NAME_ERROR', '您的名字不能少於 ' . ENTRY_FIRST_NAME_MIN_LENGTH . '  個字');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', '姓：');
define('ENTRY_LAST_NAME_ERROR', '您的姓不能少於 ' . ENTRY_LAST_NAME_MIN_LENGTH . '個字');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', '生日：');
define('ENTRY_DATE_OF_BIRTH_ERROR', '您的出生日期必須是以下格式：MM/DD/YYYY (例如：05/21/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '*(例：05/21/1970)');
define('ENTRY_EMAIL_ADDRESS', '電子郵件：');
define('ENTRY_EMAIL_ADDRESS_CONFIRM', 'Confirm Email adress:');
define('ENTRY_EMAIL_ADDRESS_CONFIRM_ERROR', 'Your confirmation email address is different from your email address.');
define('ENTRY_EMAIL_ADDRESS_ERROR', '您的電子郵件地址不能少於 ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' 個字');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '您的電子郵件地址不對 - 請坐必要修改。');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '這個電子郵件地址已經註冊過 - 請用該地址登錄或用別的地址重新註冊。');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', '街道門牌號碼：');
define('ENTRY_STREET_ADDRESS_ERROR', '街道門牌號碼不能少於 ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' 個字');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', '縣（區）：');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_DIGICODE', 'Digicode :');
define('ENTRY_DIGICODE_TEXT', '');
define('ENTRY_POST_CODE', '郵政編碼：');
define('ENTRY_POST_CODE_ERROR', '郵政編碼不能少於 ' . ENTRY_POSTCODE_MIN_LENGTH . ' 個字');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', '市（縣）：');
define('ENTRY_CITY_ERROR', '市（縣）名稱不能少於 ' . ENTRY_CITY_MIN_LENGTH . ' 個字');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', '省份：');
define('ENTRY_STATE_ERROR', '省份不能少於 ' . ENTRY_STATE_MIN_LENGTH . ' 個字');
define('ENTRY_STATE_ERROR_SELECT', '請從下拉菜單中選擇一個省份。');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', '國家：');
define('ENTRY_COUNTRY_ERROR', '您必須從下拉菜單中選擇一個國家。');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', '電話：');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '您的電話號碼不能少於 ' . ENTRY_TELEPHONE_MIN_LENGTH . ' 位數');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', '傳真：');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', '電子新聞：');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', '-訂閱-');
define('ENTRY_NEWSLETTER_NO', '-不訂閱-');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', '密碼：');
define('ENTRY_PASSWORD_ERROR', '密碼不能少於 ' . ENTRY_PASSWORD_MIN_LENGTH . ' 個字');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', '密碼確認欄的內容必須與密碼欄相同。');
define('ENTRY_PASSWORD_CONFIRMATION', '密碼確認：');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', '當前密碼：');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', '你的密碼至少要有 ' . ENTRY_PASSWORD_MIN_LENGTH . ' 個字元。');
define('ENTRY_PASSWORD_NEW', '新密碼：');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', '新密碼不能少於 ' . ENTRY_PASSWORD_MIN_LENGTH . ' 個字');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', '密碼確認欄的內容必須與新密碼相同。');
define('PASSWORD_HIDDEN', '--隱藏--');

define('FORM_REQUIRED_INFORMATION', '* 必須提供的資料');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', '頁數：');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', '顯示 <b>%d</b> 到 <b>%d</b> (共 <b>%d</b> 個商品)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', '顯示 <b>%d</b> 到 <b>%d</b> (共 <b>%d</b> 筆訂單)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', '顯示 <b>%d</b> 到 <b>%d</b>( 共 <b>%d</b> 個評論)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', '顯示 <b>%d</b> 到 <b>%d</b> (共 <b>%d</b> 個新商品)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', '顯示 <b>%d</b> 到 <b>%d</b> (共 <b>%d</b> 個特價商品)');

define('PREVNEXT_TITLE_FIRST_PAGE', '第一頁');
define('PREVNEXT_TITLE_PREVIOUS_PAGE', '前一頁');
define('PREVNEXT_TITLE_NEXT_PAGE', '下一頁');
define('PREVNEXT_TITLE_LAST_PAGE', '最後一頁');
define('PREVNEXT_TITLE_PAGE_NO', '第 %d 頁');
define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', '前 %d 頁');
define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', '後 %d 頁');
define('PREVNEXT_BUTTON_FIRST', '<<最前面');
define('PREVNEXT_BUTTON_PREV', '[<<&nbsp;往前]');
define('PREVNEXT_BUTTON_NEXT', '[往後&nbsp;>>]');
define('PREVNEXT_BUTTON_LAST', '最後面>>');

define('IMAGE_BUTTON_ADD_ADDRESS', '新地址');
define('IMAGE_BUTTON_ADDRESS_BOOK', '通訊錄');
define('IMAGE_BUTTON_BACK', '返回');
define('IMAGE_BUTTON_BUY_NOW', '立即購買');
define('IMAGE_BUTTON_CHANGE_ADDRESS', '變更地址');
define('IMAGE_BUTTON_CHECKOUT', '結帳');
define('IMAGE_BUTTON_CONFIRM_ORDER', '確認訂單');
define('IMAGE_BUTTON_CONTINUE', '繼續');
define('IMAGE_BUTTON_CONTINUE_SHOPPING', '繼續購物');
define('IMAGE_BUTTON_DELETE', '刪除');
define('IMAGE_BUTTON_EDIT_ACCOUNT', '修改帳號');
define('IMAGE_BUTTON_HISTORY', '訂單記錄');
define('IMAGE_BUTTON_LOGIN', '登錄');
define('IMAGE_BUTTON_IN_CART', '放入購物車');
define('IMAGE_BUTTON_NOTIFICATIONS', '通知');
define('IMAGE_BUTTON_QUICK_FIND', '快速搜尋');
define('IMAGE_BUTTON_REMOVE_NOTIFICATIONS', '不必通知我');
define('IMAGE_BUTTON_REVIEWS', '評論');
define('IMAGE_BUTTON_SEARCH', '搜尋');
define('IMAGE_BUTTON_SHIPPING_OPTIONS', '送貨選項');
define('IMAGE_BUTTON_TELL_A_FRIEND', '告訴朋友');
define('IMAGE_BUTTON_UPDATE', '更新');
define('IMAGE_BUTTON_UPDATE_CART', '更新購物車');
define('IMAGE_BUTTON_WRITE_REVIEW', '發表評論');

define('SMALL_IMAGE_BUTTON_DELETE', '刪除');
define('SMALL_IMAGE_BUTTON_EDIT', '修改');
define('SMALL_IMAGE_BUTTON_VIEW', '查看');

define('ICON_ARROW_RIGHT', '更多');
define('ICON_CART', '購物車內容');
define('ICON_ERROR', '錯誤');
define('ICON_SUCCESS', '成功');
define('ICON_WARNING', '警告');

define('TEXT_GREETING_PERSONAL', '<span class="greetUser">%s，</span>想看看有什麼<a href="%s"><u>新到商品</u></a>嗎？');
define('TEXT_GREETING_PERSONAL_RELOGON', '您如果不是%s, 請用自己的帳號<a href="%s"><u>登錄</u></a>。');
define('TEXT_GREETING_GUEST', '如果您已經是會員，請直接<a href="%s"><u>登錄</u></a>。 如果不是，您希望<a href="%s"><u>註冊為會員</u></a>嗎？');

define('TEXT_SORT_PRODUCTS', '商品排序：');
define('TEXT_DESCENDINGLY', '遞減，');
define('TEXT_ASCENDINGLY', '遞增，');
define('TEXT_BY', '按照：');

define('TEXT_REVIEW_BY', '評論人：%s');
define('TEXT_REVIEW_WORD_COUNT', '%s 個字');
define('TEXT_REVIEW_RATING', '評分：%s [%s]');
define('TEXT_REVIEW_DATE_ADDED', '評論日期: %s');
define('TEXT_NO_REVIEWS', '目前沒有商品評論。');

define('TEXT_NO_NEW_PRODUCTS', '目前沒有新進商品.');

define('TEXT_UNKNOWN_TAX_RATE', '不明稅率');

define('TEXT_REQUIRED', '<span class="errorTEXT">必須填</span>');

define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>錯誤：</small> 無法由指定的SMTP服務器傳送郵件，請檢查 php.ini 中的設置並作必要修改。</b></font>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', '警告： 安裝目錄仍然存在： ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. 基於安全的理由，請將這個目錄刪除。');
define('WARNING_CONFIG_FILE_WRITEABLE', '警告： 設置文件允許被寫入： ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. 這是潛在的安全風險 - 請給該文件設置正確的訪問權限。');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', '警告： sessions目錄不存在： ' . tep_session_save_path() . '. 在這個目錄未建立之前，Sessions無法工作。');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', '警告： 無法寫入sessions目錄： ' . tep_session_save_path() . '. 在訪問權限未正確設定之前 Sessions將無法正常工作。');
define('WARNING_SESSION_AUTO_START', '警告： session.auto_start已啟動 - 請到php.ini內關閉這個功能，並重新啟動網站服務器。 ');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', '警告： 可下載商品的目錄不存在： ' . DIR_FS_DOWNLOAD . '. 在這個目錄未建立之前，無法下載商品。');

define('TEXT_CCVAL_ERROR_INVALID_DATE', '輸入的信用卡有效日期無效。<br>請核對後再試。');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', '輸入的信用卡號無效。<br>請核對後再試。');
define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', '輸入的信用卡號頭四位數為： %s<br>如果卡號無誤，我們不接受此種信用卡。<br>如果有誤，請再試一遍。');

define('FOOTER_TEXT_BODY', 'Copyright &copy; ' . date('Y') . ' <a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . STORE_NAME . '</a>');
define('Our_Best_Candles', '我们最好的香烛');
define('Our_Best_P_Her', '最佳女士香水');
define('Our_Best_P_Him', '最佳男士香水');
define('Skin_Care', '最佳护肤品');
define('Nos_meilleurs_coffrets_w', '最佳礼品装'); 
define('Nos_meilleurs_coffrets_m', '最佳男士礼品套装');
define('meilleurs_marques', '顶极品牌');
define('Nos_marques', '我们的品牌');
define('minimum_order',  '<div align="center"><img src="images/wholesaleonly.jpg"></div>');
define('BOX_SHOPPING_CART_MIN_ORDER', '最小起订量:150欧元');
define('HEADER_HELLO', '欢迎光临');
define('HEADER_LOGIN', '登陆');
define('HEADER_LOGOUT', '登出');
define('CHOOSE_YOUR_CAT', '感谢您点击您的备选目录 : ');
define('CHOOSE_YOUR_BRAND', '感谢您点击您的备选品牌 : ');

define('TEXT_DISPLAY_NUMBER_OF_RANGES', '展示  <b>%d</b> to <b>%d</b> (over <b>%d</b> ranges)');
define('TEXT_INSTEAD_OF', '代替');
define('TEXT_EN_STOCK', '<span class="en_stock">有库存</span>');

define('MENU_HOME', '欢迎光临');
define('MENU_FRAGRANCE_WOMEN', '女士香水');
define('MENU_FRAGRANCE_MEN', '男士香水');
define('MENU_ALL_BRANDS', '我们所有的品牌');
define('MENU_MY_ACCOUNT', '我的帐户');
define('MENU_CHRISTMAS', '特别圣诞节');
define('MENU_MONTHLY', '特殊月份');
define('MENU_SPONSORSHIP', '赞助');
define('MENU_CONTACT', '联系');
define('MENU_FLASH', '秒杀');

define('OTHERS_LIST_PRODUCTS', '这个系列的其它产品');

$tmp = array(
'Mon' => '星期一',
'Tue' => '星期二',
'Wed' => '星期三',
'Thu' => '星期四',
'Fri' => '星期五',
'Sat' => '星期六',
'Sun' => '星期日',
);
$tmp = $tmp[date('D')];
define('MENU_DAILY', '推广 '.$tmp);
                              
define('FOR_HIM', '<span class="for_him">送给他</span>');
define('FOR_HER', '<span class="for_her">送给她</span>');
define('FOR_UNISEX', '<span class="for_him">男女都可用的</span><span class="for_her">sex</span>');
define('FOR_HIM_STR', '送给他');
define('FOR_HER_STR', '送给她');
define('FOR_UNISEX_STR', '男女都可用的');
define('TEXT_SAVING', '省钱');

define('PRICE_TIMER', 1.33);
define('PRICE_ADDER', 19);

define('DISPLAY_ALPHABET','按字母顺序显示');
define('DISPLAY_SEARCH','查找便宜香水');

define('DISPLAY_DISCOUNT','展示');

define('DISPLAY_DISCOUNT_FIRST','选择折扣');

define('DISPLAY_PRICE_FIRST','价格区域');

define('MENU_VALENTIN', '');
define('PAYEMENT_100_SECURE', '100％的安全支付');

?>