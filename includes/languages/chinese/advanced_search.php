<?php
/*
  $Id: advanced_search.php,v 1.1.1.1 2002/11/07 03:16:48 nickle Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce
  Released under the GNU General Public License

   
*/

define('NAVBAR_TITLE_1', '高級搜尋');
define('NAVBAR_TITLE_2', '搜尋結果');

define('HEADING_TITLE_1', '高級搜尋');
define('HEADING_TITLE_2', '滿足搜尋標準的商品');

define('HEADING_SEARCH_CRITERIA', '搜尋標準');

define('TEXT_SEARCH_IN_DESCRIPTION', '在商品描述內搜尋');
define('ENTRY_CATEGORIES', '商品分類：');
define('ENTRY_INCLUDE_SUBCATEGORIES', '包含商品子分類');
define('ENTRY_MANUFACTURERS', '製造商：');
define('ENTRY_PRICE_FROM', '價格從：');
define('ENTRY_PRICE_TO', '到:');
define('ENTRY_DATE_FROM', '上架日期從：');
define('ENTRY_DATE_TO', '到:');

define('TEXT_SEARCH_HELP_LINK', '<u>搜尋幫助</u> [?]');

define('TEXT_ALL_CATEGORIES', '所有商品分類');
define('TEXT_ALL_MANUFACTURERS', '所有製造商');

define('HEADING_SEARCH_HELP', '搜尋幫助');
define('TEXT_SEARCH_HELP', '可以用 AND 和/或 OR 將關鍵字分開，以得到理想的搜尋結果。例如，<u>Microsoft AND mouse</u> 所得到的搜尋結果會同時包含這兩個關鍵字。而<u>mouse OR keyboard</u> 所得的結果會同時包含這兩個或其中任一關鍵字。<br><br>要搜尋完全匹配的詞句，可以將關鍵詞用雙引號引起來。例如，<u>"notebook computer"</u>所得到的搜尋結果會含有完全相同的句子。<BR><BR>在搜尋中也可使用括號以得到更好的結果。<br><br>例如，<u>Microsoft and (keyboard or mouse or "visual basic")</u>');
define('TEXT_CLOSE_WINDOW', '<u>關閉視窗</u> [x]');

define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_MODEL', '型號');
define('TABLE_HEADING_PRODUCTS', '商品名稱');
define('TABLE_HEADING_MANUFACTURER', '製造商');
define('TABLE_HEADING_QUANTITY', '數量');
define('TABLE_HEADING_PRICE', '價格');
define('TABLE_HEADING_WEIGHT', '重量');
define('TABLE_HEADING_BUY_NOW', '馬上買');

define('TEXT_NO_PRODUCTS', '沒有找到符合條件的商品。');

define('ERROR_AT_LEAST_ONE_INPUT', '* 下列欄目之一必須填：\n    關鍵字\n    上架日期從\n    到\n    價格從\n    到\n');
define('ERROR_INVALID_FROM_DATE', '* 無效的起始日期\n');
define('ERROR_INVALID_TO_DATE', '* 無效的結束日期');
define('ERROR_TO_DATE_LESS_THAN_FROM_DATE', '* 結束日期必須大於或等於起始日期\n');
define('ERROR_PRICE_FROM_MUST_BE_NUM', '* 下限價格必須為數字\n');
define('ERROR_PRICE_TO_MUST_BE_NUM', '* 上限價格必須為數字\n');
define('ERROR_PRICE_TO_LESS_THAN_PRICE_FROM', '* 價格上限必須大於或等於價格下限\n');
define('ERROR_INVALID_KEYWORDS', '* 無效的關鍵字\n');
?>
