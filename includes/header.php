<?php
/*
  $Id: header.php,v 1.42 2003/06/10 18:20:38 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
//ini_set('date.timezone', 'Europe/Paris');
//$abbrarray = timezone_abbreviations_list();
//var_rh($abbrarray);

// check if the 'install' directory exists, and warn of its existence
  if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install')) {
      $messageStack->add('header', WARNING_INSTALL_DIRECTORY_EXISTS, 'warning');
    }
  }

// check if the configure.php file is writeable
  if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
      $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE, 'warning');
    }
  }

// check if the session folder is writeable
  if (WARN_SESSION_DIRECTORY_NOT_WRITEABLE == 'true') {
    if (STORE_SESSIONS == '') {
      if (!is_dir(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NON_EXISTENT, 'warning');
      } elseif (!is_writeable(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NOT_WRITEABLE, 'warning');
      }
    }
  }

// check session.auto_start is disabled
  if ( (function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true') ) {
    if (ini_get('session.auto_start') == '1') {
      $messageStack->add('header', WARNING_SESSION_AUTO_START, 'warning');
    }
  }

  if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
      $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
  }

  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  
  $customer_name = tep_session_is_registered('customer_id') ? ucfirst($_SESSION['customer_last_name']) .' '.ucfirst($_SESSION['customer_first_name']) : '';
  if (tep_session_is_registered('customer_id')){
    $sql = "SELECT count(*) as new
	  FROM  `ticket` 
	  INNER JOIN `ticket_message` ON  `ticket`.id = ticket_id
	  WHERE  `customer_id` = ".$_SESSION['customer_id'].
	  " and ticket_message.status = 0";
    $res =  tep_db_query($sql);
    $res = tep_db_fetch_array($res);
    $res = $res['new'];
    if ($res > 0){
      $customer_name .= '<br/><a class="banner_login log_text new_message" href="'.FILENAME_MY_TICKET.'">'.NEW_MESSAGES.' ('.$res.')</a>';
    }
    else {
     $customer_name .= '<br/><a class="banner_login log_text" href="'.FILENAME_MY_TICKET.'">'.NO_MESSAGE.'</a>';
    }
    
  }
  if (SPONSORSHIP_ACTIVATE && isset($customer_email_address))
      $new_discount = $sponsorship->check_new_discounts($customer_email_address);
      
  $query = tep_db_query('SELECT categories_id, categories_name FROM '.TABLE_CATEGORIES_DESCRIPTION.' WHERE categories_id IN (27, 28, 38) AND language_id = '.(int)$languages_id);
  $categories = array();
  while ($rs = tep_db_fetch_array($query))
    $categories[$rs['categories_id']] = $rs['categories_name'];
?>
<!-- start -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="includes/animation.js"></script>
<script type="text/javascript" src="includes/zoom.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33173893-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<table cellpadding="0" cellspacing="0" border="0" style="width:980px" align="center">
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" border="0" style="height:169px;" class="header">
				<tr>
					<td align="center">
                    	<table cellpadding="0" cellspacing="0" border="0" style="height:93px; width:980px">
                            <tr>
                                <td><a style="float:left;width:600px;height:97px;" href="<?php echo tep_href_link('index.php')?>"><?php echo tep_image(DIR_WS_IMAGES.'logo.gif', 'logo', '', '', ' id="header_logo" ')?></a></td>
                                <!--<td style="width:179px">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr><td nowrap class="vam"><?php echo BOX_HEADING_CURRENCIES?>: &nbsp;</td><td style="width:100%"><?php
    echo tep_draw_form('currencies', tep_href_link(basename($PHP_SELF), '', $request_type, false), 'get');
    reset($currencies->currencies);
    $currencies_array = array();
    while (list($key, $value) = each($currencies->currencies)) {
      $currencies_array[] = array('id' => $key, 'text' => $value['title']);
    }
    $hidden_get_variables = '';
    reset($HTTP_GET_VARS);
    while (list($key, $value) = each($HTTP_GET_VARS)) {
      if ( ($key != 'currency') && ($key != tep_session_name()) && ($key != 'x') && ($key != 'y') ) {
        $hidden_get_variables .= tep_draw_hidden_field($key, $value);
      }
    }
    echo tep_draw_pull_down_menu('currency', $currencies_array, $currency, 'onChange="this.form.submit();" class="select"') . $hidden_get_variables . tep_hide_session_id();
    echo '</form>';
?> </td></tr>
                                    </table>
                                </td>-->
                                <?php if ($check_server == 'fr') {?>
                                    <td><?php require_once(DIR_WS_MODULES.'easy_coupons_box2.php'); ?></td>
                                <?php } ?>
                                <td><?php echo $customer_name ? HEADER_HELLO . ' ' . $customer_name . '<br />'.($new_discount > 0 ? constant('HEADER_NEW_DISCOUNT'.($new_discount > 1 ? 'S' : '')) . '<br />' : '').'<a class="log_text" href="'.tep_href_link('logoff.php').'">'.HEADER_LOGOUT.'</a>' : '<a class="log_text" href="'.tep_href_link('login.php').'">'.HEADER_LOGIN.'</a>'; ?></td>
                                <td><?php echo tep_image(DIR_WS_IMAGES.'z.gif')?></td>
                                <td><?php echo tep_draw_separator('spacer.gif', '11', '1'); ?></td>
                                <td style="width:150px">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr><td nowrap class="vam"><?php echo BOX_HEADING_LANGUAGES?> : </td><td style="width:980px"><?php
 if (!isset($lng) || (isset($lng) && !is_object($lng))) {
 include(DIR_WS_CLASSES . 'language.php');
 $lng = new language;
 }
 $languages_string = '';
 reset($lng->catalog_languages);
 while (list($key, $value) = each($lng->catalog_languages)) {
 if ($key == $check_server)
    $languages_string .= '&nbsp;<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . tep_image(DIR_WS_LANGUAGES . $value['directory'] . '/images/' . $value['image'], $value['name']) . '</a>&nbsp;&nbsp;';
 }
 echo $languages_string;
?></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table> 
                        <table cellpadding="0" cellspacing="0" border="0" style="height:29px; background:url(images/top1.gif) no-repeat right; width:100%">
                            <tr>
                               <td align="right" style="font-size:11px;color:red;font-weight:bold;"><?php /*echo BOX_SHOPPING_CART_MIN_ORDER;*/ ?></td>
							    <td width="20%"  align="right" class="shipCart"><?php //echo tep_draw_separator('spacer.gif', '610', '1'); ?><?php echo tep_image(DIR_WS_IMAGES.'z1.gif')?> &nbsp; <?php echo BOX_HEADING_SHOPPING_CART?>(<a href="<?php echo tep_href_link('shopping_cart.php')?>"><?php echo $cart->count_contents(false)?> <?php echo BOX_SHOPPING_CART_EMPTY?></a>)</td>
                            </tr>
                        </table> 
                        <table cellpadding="0" cellspacing="0" border="0" class="sub_menu">
                            <tr>
                                <td style="width: 11px;background:white;"><img src="images/border_left.GIF" /></td>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" class="main_menu">
                                        <tr>
                                            <td>
                                                <a class="menu_top1" href="<?php echo tep_href_link('index.php')?>">
                                                    <?php echo MENU_HOME?></a>
                                            </td>
                                            <td>
                                                <a class="menu_top2" href="<?php echo tep_href_link('index.php', 'cPath=38_28'.'&name='.$categories['28'])?>">
                                                    <?php echo MENU_FRAGRANCE_WOMEN?></a>
                                            </td>
                                            <td>
                                                <a class="menu_top3" href="<?php echo tep_href_link('index.php', 'cPath=38_27'.'&name='.$categories['27'])?>">
                                                    <?php echo MENU_FRAGRANCE_MEN?></a>
                                            </td>
                                            <td>
                                                <a class="menu_top5" href="<?php echo tep_href_link('index.php', 'cPath=38'.'&name='.$categories['38'])?>">
                                                    <?php echo MENU_ALL_BRANDS?></a>
                                            </td>

                                            <td>
                                                <a class="menu_top7" href="<?php echo tep_href_link('account.php')?>">
                                                    <?php echo MENU_MY_ACCOUNT?></a>
                                            </td>
                                            <td>
                                                <a class="menu_top8" href="<?php echo tep_href_link('contact_us.php')?>">
                                                    <?php echo MENU_CONTACT?></a>
                                            </td>
                                        </tr>
                                        </table>
                                </td>
                                <td style="width:207px"><?php echo tep_draw_form('search',tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false),'get') ?>



                                	<table cellpadding="0" cellspacing="0" border="0" style="width:207px">
                                    	<tr><td><input type=text name="keywords" class="go" value=""></td><td><?php echo tep_image_submit('button_search_prod.gif','')?></td></tr>
                                    </table></form>
                                </td>
                                <td style="width: 11px;background:white;"><?php echo tep_image('images/border_right.gif')?></td>
                            </tr>
                        </table>
                        <table cellpadding="0" cellspacing="0" border="0" style="background:black; width:980px;margin-top:5px;" class="main_menu">
                            <tr>
                                <td style="width: 11px;background:white;"><img src="images/border_left.GIF" /></td>
                                <td>
                                    <a class="menu_top4"  style="color:#E519A8;font-weight:bold;" href="<?php echo tep_href_link(FILENAME_MONTHLY)?>">
                                        <?php echo MENU_MONTHLY; ?></a>
                                </td>
                                <?php if ($check_server == 'fr') {?>
                                  <td>
                                    <!--  <a class="menu_top1" href="<?php echo tep_href_link(FILENAME_PROMO)?>">
                                          <?php echo MENU_GIFT?></a> -->
                                  </td>
                                <?php } ?>
                               <!-- <td>
                                    <a style="color:red;font-weight:bold;" class="menu_top1" href="<?php //echo tep_href_link(FILENAME_VALENTIN)?>">
                                        <?php //echo MENU_VALENTIN;?></a>
                                </td> -->
                                <td>
                                    <a class="menu_top1" href="<?php echo tep_href_link(FILENAME_FLASH)?>">
                                        <?php echo MENU_FLASH?></a>
                                </td>
                                <td>
                                    <a class="menu_top2" href="<?php echo tep_href_link('faq.php')?>">
                                        <?php echo BOX_INFORMATION_FAQ?></a>
                                </td>
                                <td>
                                    <a class="menu_top3" href="<?php echo tep_href_link(FILENAME_DAILY)?>">
                                        <?php echo MENU_DAILY?></a>
                                </td>
                                <?php if (SPONSORSHIP_ACTIVATE) {?>
                                    <td>
                                        <a class="menu_top6" href="<?php echo tep_href_link(FILENAME_SPONSORSHIP_ADD)?>">
                                            <?php echo MENU_SPONSORSHIP?></a>
                                    </td>
                                <?php } ?>
                                <td style="width: 11px;background:white;"><img src="images/border_right.gif" /></td>
                            </tr>
                        </table>
                        <br style="line-height:17px"> 
                     </td>
				</tr>
			</table>

<!-- end -->
<?php
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerError">
    <td class="headerError"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?></td>
  </tr>
</table>
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerInfo">
    <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
  </tr>
</table>
<?php
  }
?>
<!-- start -->
         </td>
	</tr>
	<tr>
		<td>
<!-- end -->

<?php 
define('MAX_DESCR_1','58');
define('MAX_DESCR_BESTS','19');
define('MAX_DESCR_REVIEWS','59');
?>
