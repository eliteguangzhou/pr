<?php
/*
  $Id: index.php,v 1.1 2003/06/11 17:38:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', '這裡是 osCommerce 項目的展示店，所列商品均為示範目的，<b>任何訂購的商品都不會發貨或產生帳單</b>。所有商品的資料都應視為虛構。<br><br><table border="0" width="100%" cellspacing="5" cellpadding="2"><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/1.gif') . '</td><td class="main" valign="top"><b>錯誤信息</b><br><br>如果有錯誤或警告信息，請先改正錯誤。<br><br>錯誤信息用 <span class="messageStackError">背景</span> 顏色顯示在一頁上方。<br><br>我們要做多項檢查以確保您的在線商店設置正確 - 如果您不要做這些檢查，請修改位於文件     includes/application_top.php 底部的相應參數。</td></tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/2.gif') . '</td><td class="main" valign="top"><b>修改文字內容</b><br><br>本段文字可在以下文件中修改：<br><br><nobr class="messageStackSuccess">[catalog]/includes/languages/' . $language . '/' . FILENAME_DEFAULT . '</nobr><br><br>該文可手工修改，也可用管理工具：<nobr class="messageStackSuccess">語言->' . ucfirst($language) . '->定義</nobr> 或 <nobr class="messageStackSuccess">系統工具->文件管理器</nobr><br><br>文字內容是如下設定的：<br><br><nobr>define(\'TEXT_MAIN\', \'<span class="messageStackSuccess">這是 osCommerce 項目的展示...</span>\');</nobr><br><br>用綠色突出顯示的文字可以修改 - 一定要保留關鍵詞 TEXT_MAIN。要完全刪除這段文字，只需保留兩個單引號：<br><br><nobr>define(\'TEXT_MAIN\', \'\');</nobr><br><br>關於 PHP define() 函數的更多資料可在<a href="http://www.php.net/define" target="_blank"><u>這裡</u></a>找到。</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/3.gif') . '</td><td class="main" valign="top"><b>保護管理頁</b><br><br>由於目前沒有其他安全措施，所以你一定要保護管理頁。</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/4.gif') . '</td><td class="main" valign="top"><b>在線文檔</b><br><br>在線文檔可在 <a href="http://wiki.oscommerce.com" target="_blank"><u>osCommerce Wiki 文檔</u></a> 網站找到。<br><br>社區支持網站為：<a href="http://forums.oscommerce.com" target="_blank"><u>osCommerce 社區支持論壇</u></a>。</td></tr></table>
<br><br>如果您想下載本店所使用的電子商務軟件，或希望參與 osCommerce 項目的開發，請訪問 <a href="http://www.oscommerce.com" target="_blank"><u>osCommerce 的支持網站</u></a>。本店使用 <font color="#f0000"><b>' . PROJECT_VERSION . '</b></font> 版。');
define('TABLE_HEADING_NEW_PRODUCTS', '本月新到商品');
define('TABLE_HEADING_UPCOMING_PRODUCTS', '即將到貨商品');
define('TABLE_HEADING_DATE_EXPECTED', '預計到貨日期');
define('TEXT_PRICE_FROM', 'from');
  
if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', '商品列表');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', '型號');
  define('TABLE_HEADING_PRODUCTS', '品名');
  define('TABLE_HEADING_MANUFACTURER', '製造商');
  define('TABLE_HEADING_QUANTITY', '數量');
  define('TABLE_HEADING_PRICE', '價格');
  define('TABLE_HEADING_WEIGHT', '重量');
  define('TABLE_HEADING_BUY_NOW', '馬上買');
  define('TEXT_NO_PRODUCTS', '本目錄目前沒有任何商品。');
  define('TEXT_NO_PRODUCTS2', '本製造商目前沒有任何商品。');
  define('TEXT_NUMBER_OF_PRODUCTS', '商品數量：');
  define('TEXT_SHOW', '<b>顯示：</b>');
  define('TEXT_BUY', '買 1\'');
  define('TEXT_NOW', '\'');
  define('TEXT_ALL_CATEGORIES', '所有分類');
  define('TEXT_ALL_MANUFACTURERS', '所有製造商');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', '歡迎光臨本店！');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', '商品分類');
}


define('NEW_INTRO','欢迎来到低价香水秘密王国!

请浏览香水品牌<span class="text_rose"> 法国最低价 !</span>
请先比较买购买! <span Class="text_rose"> 我们返还差价! </ Span>

« <a class="text_rose" href="'.tep_href_link(FILENAME_ADVANTAGES).' align="right" >了解我们的优势</a> »
<TABLE><TD>- <span class="text_rose">我们的网站上有20000个</span> 香水和化妆品
- 500 个品牌在 -40%, -50%, -70%
- 3€, 8€, <span class="text_rose">15€ 折扣</span> 
- <span class="text_rose">两件以上减 3€</span> 
-购买两件可获 <span class="text_rose">HUGO BOSS </span>  礼品
</TD>
<TD>- 所有在线产品都有库存
- <span class="text_rose">满意或是30天内退款</span>
- <span class="text_rose">安全</span> 付款
</TD></TABLE>');

define('TEXT_INFO', '
<h3 class="text_rose">我们的理念</h3>
<b>'.STORE_NAME.'</b> 是一个香水销售俱乐部.
感谢我们在俱乐部里得到的好评。事实上，你们可以永远拿到最低价，小量库存，海量选择，品牌，更多自主

目前，俱乐部有超过5，000名积极会员，从此我们可以通过量大拿到很很便宜的价格。

每一位俱乐部的会员都像是一个买家或是独立供应商

优点 <span class="text_rose">俱乐部会员:</span>

我们提供的超低价格的香水（不含化妆品）
20,000 品牌香水s<span class="text_rose">100%  正货</span> 吸塑包装
通往80个国家的海运
所有在线产品都有库存
<span class="text_rose">优先</span> 订单
<span class="text_rose">30天</span> 满意或是退款
<span class="text_rose">8-12个工</span> 作日快递
<span class="text_rose">70%-80%</span> 店率

<span class="text_rose">我们的香水可以送达到世界各地，这样您可以做到零库存！</span>

瞬间您就可拥有多达<span class="text_rose">20，000</span> 款化妆品，<span class="text_rose">6，000</span> 平方的仓库

您不必担心款式过时带来风险，您现有的款式对客户都有相当大的吸引力

您可对您想报税的销售申请报税... 这是免费不需要交税的!

<b>'.STORE_NAME.'</b> 只赚会员的钱

<div class="center gras">
您需要帮助吗
有销售人员帮助您: <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'">'.STORE_OWNER_EMAIL_ADDRESS.'</a>
</div>');
?>

