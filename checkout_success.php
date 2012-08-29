<?php
/*
  $Id: checkout_success.php,v 1.49 2003/06/09 23:03:53 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

// if the customer is not logged on, redirect them to the shopping cart page
  if (!tep_session_is_registered('customer_id')) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'update')) {
    $notify_string = '';

    if (isset($HTTP_POST_VARS['notify']) && !empty($HTTP_POST_VARS['notify'])) {
      $notify = $HTTP_POST_VARS['notify'];

      if (!is_array($notify)) {
        $notify = array($notify);
      }

      for ($i=0, $n=sizeof($notify); $i<$n; $i++) {
        if (is_numeric($notify[$i])) {
          $notify_string .= 'notify[]=' . $notify[$i] . '&';
        }
      }

      if (!empty($notify_string)) {
        $notify_string = 'action=notify&' . substr($notify_string, 0, -1);
      }
    }

    tep_redirect(tep_href_link(FILENAME_DEFAULT, $notify_string));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_SUCCESS);

  $breadcrumb->add(NAVBAR_TITLE_1);
  $breadcrumb->add(NAVBAR_TITLE_2);

  $global_query = tep_db_query("select global_product_notifications from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (int)$customer_id . "'");
  $global = tep_db_fetch_array($global_query);

  if ($global['global_product_notifications'] != '1') {
    $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
    $orders = tep_db_fetch_array($orders_query);

    $products_array = array();
    $products_query = tep_db_query("select products_id, products_name from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$orders['orders_id'] . "' order by products_name");
    $products_ids = '';
    while ($products = tep_db_fetch_array($products_query)) {
       $products_ids .= $products['products_id'].',';
      $products_array[] = array('id' => $products['products_id'],
                                'text' => $products['products_name']);
    }
  }

  //pour les stats shopzilla, shopping...
  $total_cost = round($rsi*$currencies->currencies[$currency]["value"]*100)/100;

  //friend discount
  $mail_sent = false;
  require_once(DIR_WS_CLASSES . '/friend_discount.php');
  $friend_discount = new friendDiscount();
  $max_friend_discount = MAX_FRIEND_DISCOUNT / $currencies->currencies["EUR"]['value'];

  $friend_emails = $friend_discount->get($insert_id);
  if (empty($friend_emails) && tep_session_is_registered('order_valid') && $order_valid === true && isset($_POST['email'])){
    $emails = array_unique($_POST['email']);
    $has_error = false;

    foreach ($emails as $index => $email)
        if (empty($email))
            unset($emails[$index]);
        elseif (!$has_error && !(tep_validate_email($email) && $email != $customer_email_address)) {
            $messageStack->add('bad_email', BAD_FRIEND_EMAIL);
            $has_error = true;
        }
        elseif (!$has_error && $friend_discount->check_email($email, $customer_id)) {
            $messageStack->add('bad_email', ERROR_DISCOUNT_ALREADY_GIVEN);
            $has_error = true;
        }

    if ($messageStack->size('bad_email') == 0) {
        $date = getdate(strtotime("+ 2 day"));
        $day_after_tomorrow_iso = $date['year'].'-'.($date['mon'] < 10 ? '0' : '').$date['mon'].'-'.($date['mday'] < 10 ? '0' : '').$date['mday'].' '.($date['hours'] < 10 ? '0' : '').$date['hours'].':'.($date['minutes'] < 10 ? '0' : '').$date['minutes'].':'.($date['seconds'] < 10 ? '0' : '').$date['seconds'];
        $godfather_fullname = ucfirst($customer_first_name) . ' ' . ucfirst($customer_last_name);
        foreach ($emails as $email)  {
            $code = gen_coupon_code(SPONSORSHIP_CODE_LENGTH);
            $sponsorship->generate_discount($code, $max_friend_discount, $email, $day_after_tomorrow_iso, $insert_id, 0);
            tep_mail(
                '',
                $email,
                sprintf(FRIEND_DISCOUNT_EMAIL_SUBJECT, $godfather_fullname),
                nl2br(sprintf(FRIEND_DISCOUNT_EMAIL_TEXT, $godfather_fullname, $currencies->display_price($max_friend_discount), $code)),
                STORE_NAME,
                STORE_OWNER_EMAIL_ADDRESS
            );
            $friend_discount->track_friend($email, $customer_id, $insert_id);
            $mail_sent = true;
        }
        tep_session_unregister('order_valid');
    }
  }
  
  //Merchant_id pour shopping suivant la langue
  switch ($check_server) {
    case 'fr' : $merchant_id_shopping = 478192;$merchant_id_shopzilla = 220842;break;
    case 'de' : $merchant_id_shopping = 479012;$merchant_id_shopzilla = 223106;break;
    case 'en' : $merchant_id_shopping = false;$merchant_id_shopzilla = 231079;break;
    default : $merchant_id_shopping = false;$merchant_id_shopzilla = false;break;
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<?php if ($merchant_id_shopping && isset($beezup_pid)) { ?>
<script language="JavaScript">
    //Shopping.com
    var merchant_id = '<?php echo $merchant_id_shopping; ?>';
    var order_amt = '<?php echo $total_cost; ?>';
    var order_id = '<?php echo $insert_id; ?>';
</script>
<script language="JavaScript" src="https://stat.DealTime.com/ROI/ROI.js?mid=478192"></script>
<?php } ?>

<?php if ($merchant_id_shopzilla && isset($beezup_pid)) { ?>
<script language="javascript">
<!--
    //Shopzilla.com
	/* Performance Tracking Data */
	var mid            = '<?php echo $merchant_id_shopzilla; ?>';
	var cust_type      = '<?php echo $new_client; ?>';
	var order_value    = '<?php echo $total_cost; ?>';
	var order_id       = '<?php echo $insert_id?>';
	var units_ordered  = '<?php echo $total_products; ?>';
//-->
</script>
<script language="javascript" src="https://www.shopzilla.com/css/roi_tracker.js"></script>
<?php }
require_once(DIR_WS_INCLUDES.'head.php');
if (isset($beezup_pid) && in_array($check_server, array('fr'))) {
  ?>
  <script type="text/javascript">
  ValidPayement = true;
  OrderBeezUP = {
    OrderMerchantId: "<?php echo $insert_id?>",
    TotalCost: <?php echo $total_cost; ?>,
    ListProductId: "<?php echo $beezup_pid; ?>",
    ListProductQuantity: "<?php echo $beezup_qty; ?>",
    ListProductUnitPrice: "<?php echo $beezup_price; ?>"
  };
  saveOrder(OrderBeezUP);
  </script>
  <?php
    tep_session_unregister('beezup_pid');
    tep_session_unregister('beezup_qty');
    tep_session_unregister('beezup_price');
}
?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<?php
  tep_session_unregister('rsi');
  tep_session_unregister('total_products');
  if (isset($_POST['email'])) {
      if (tep_session_is_registered('netaffiliation') && ($check_server == 'fr' || $check_server == 'es')) {
        if ($check_server == 'fr')
            echo '<img src="http://action.metaffiliation.com/suivi.php?mclic=S433B11014&argann='.$insert_id.'" width="1" height="1" border="0">';
        elseif ($check_server == 'es')
            echo '<img src="http://action.metaffiliation.com/suivi.php?mclic=S43C4F1016&argann='.$insert_id.'" width="1" height="1" border="0">';
        tep_session_unregister('netaffiliation');
      }
  }
  if (tep_session_is_registered('netaffiliation') && ($check_server == 'fr' || $check_server == 'es')) {
    if ($check_server == 'fr')
        echo '<iframe frameborder="0" width="1" height="1" scrolling="no" src="http://action.metaffiliation.com/suivi.php?mclic=I433B11012&argmon='.(round($netaffiliation*$currencies->currencies[$currency]['value']*100)/100).'&argann='.$insert_id.'"><img src="http://action.metaffiliation.com/suivi.php?mclic=S433B11012&argmon='.(round($netaffiliation*$currencies->currencies[$currency]['value']*100)/100).'&argann='.$insert_id.'" width="1" height="1" border="0"></iframe>';
    elseif ($check_server == 'es')
        echo '<iframe frameborder="0" width="1" height="1" scrolling="no" src="http://action.metaffiliation.com/suivi.php?mclic=I43C4F1012&argmon='.(round($netaffiliation*$currencies->currencies[$currency]['value']*100)/100).'&argann='.$insert_id.'"><img src="http://action.metaffiliation.com/suivi.php?mclic=S43C4F1012&argmon='.(round($netaffiliation*$currencies->currencies[$currency]['value']*100)/100).'&argann='.$insert_id.'" width="1" height="1" border="0"></iframe>';
  }
?>

<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
   </td>
<!-- body_text //-->
    <td width="100%" class="col_center"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td>

<?php tep_draw_heading_top(901);?>

<?php
 //new contentBoxHeading_ProdNew($info_box_contents);
 ?>

<?php
tep_draw_heading_top_1();

?>
		<?php
          if ($messageStack->size('bad_email') > 0) {
        ?>
             <p style="margin:10px 0 0 0"><?php echo $messageStack->output('bad_email'); ?></p>
        <?php
          }
        ?>

		<table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
               <td valign="top" class="main"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?>
                    <?php
                        if (!$mail_sent) {
                            echo sprintf(HEADING_TITLE, $insert_id, $insert_id);
                            
                            if (ACTIVATE_DISCOUNT)
                                echo sprintf(HEADING_TITLE2, $currencies->display_price($max_friend_discount), isset($_POST['email'][0]) ? $_POST['email'][0] : '', isset($_POST['email'][1]) ? $_POST['email'][1] : '', isset($_POST['email'][2]) ? $_POST['email'][2] : '');
                        }
                        else
                            echo sprintf(MAIL_SENT);
                    ?>
                </td>
           </tr>
           <tr><td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td></tr>
        </table>

	  <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" align="right"><?php echo tep_draw_separator('pixel_silver.gif', '1', '5'); ?></td>
                <td width="50%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
              </tr>
            </table></td>
            <td width="25%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
            <td width="25%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
            <td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
                <td width="50%"><?php echo tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'); ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_DELIVERY; ?></td>
            <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_PAYMENT; ?></td>
            <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_CONFIRMATION; ?></td>
            <td align="center" width="25%" class="checkoutBarCurrent"><?php echo CHECKOUT_BAR_FINISHED; ?></td>
          </tr>
       </table>

<?php tep_draw_heading_bottom_1();?>

<?php tep_draw_heading_bottom();?>

		</td>
      </tr>
<?php if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . 'downloads.php'); ?>
    </table></td>
<!-- body_text_eof //-->
    <td class="col_right">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </td>
  </tr>
</table>
<!-- body_eof //-->
<?php if ($check_server == 'fr') { ?>
<script type="text/javascript">var journeycode='cb315074-8bd8-4823-a0f8-b6166358963e';var captureConfigUrl='rcs.veinteractive.com/CaptureConfigService.asmx/CaptureConfig'; (function() {     var ve = document.createElement('script'); ve.type = 'text/javascript'; ve.async = true;     ve.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'config1.veinteractive.com/vecapturev5.js';     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ve, s);})();</script>
<img src="http://www2.adserverpub.com/sale.php?id=1760&key=b560203959a7987cd94973f10f70d53a&amount=<?php echo $total_cost; ?>&track=<?php echo $insert_id; ?>" height="1" width="1">
<img src="http://www2.adserverpub.com/sale.php?id=1761&key=a06c6b068d45a48b3db9134297ebf3b2&amount=<?php echo $total_cost; ?>&track=<?php echo $insert_id; ?>" height="1" width="1">
<script src="http://nxtck.com/act.php?zid=15886;id=<?php echo $insert_id; ?>;mt=<?php echo $total_cost; ?>"></script>
<script src="http://affiliates.holosfind.com/i_sale_third/432/<?php echo $products_list.'/'.$insert_id; ?>"></script>
<noscript><IMG SRC="http://affiliates.holosfind.com/i_track_sale/432/<?php echo $products_list.'/'.$insert_id; ?>"></noscript>
<?php
  tep_session_unregister('products_list');
} elseif ($check_server == 'es') { ?>
<script src='http://affiliates.holosfind.com/i_sale_third/435/<?php echo $products_list.'/'.$insert_id; ?>'></script>
<noscript><img src='http://affiliates.holosfind.com/i_track_sale/435/<?php echo $products_list.'/'.$insert_id; ?>'></noscript>
<?php
  tep_session_unregister('products_list');
} elseif ($check_server == 'de') { ?>
<script src='http://affiliates.holosfind.com/i_sale_third/434/<?php echo $products_list.'/'.$insert_id; ?>'></script>
<noscript><img src='http://affiliates.holosfind.com/i_track_sale/434/<?php echo $products_list.'/'.$insert_id; ?>'></noscript>
<?php
  tep_session_unregister('products_list');
} ?>
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<?php if (in_array($check_server, array('de', 'es'))) { ?>
<!-- Google Code for Marque Parfum Remarketing List -->
<!-- Google Code for Mode de Paiement Remarketing List -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1024320665;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "666666";
var google_conversion_label = "WH59CMnJ8gEQmcm36AM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1024320665/?label=WH59CMnJ8gEQmcm36AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php } elseif (in_array($check_server, array('br'))) { ?>
<!-- Google Code for Achat Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1024320665;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "hVSmCLOrtAEQmcm36AM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1024320665/?label=hVSmCLOrtAEQmcm36AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php } elseif (in_array($check_server, array('mx'))) { ?>
<!-- Google Code for Achat/Mexique Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1024320665;
var google_conversion_language = "es";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "k98ECMmCiAIQmcm36AM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1024320665/?label=k98ECMmCiAIQmcm36AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php } elseif (in_array($check_server, array('it'))) { ?>
<!-- Google Code for Achat/Italie Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1024320665;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "DsEMCNGBiAIQmcm36AM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1024320665/?label=DsEMCNGBiAIQmcm36AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php } ?>
<img src="http://newsletters.parfumreduc.com/ev/parfumreduc?eventid=650000044&itemcnt=<?php echo $total_products;?>&amount=<?php echo $total_products_price;?>&random=<?php echo uniqid();?>&ecm_order_id=<?php echo $insert_id;?>" width="1" height="1" />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
<script type="text/javascript" src="http://img.netaffiliation.com/u/31/p13233.js?zone=fincommande&montant=<?php echo $netaffiliation;?>&listeids=<?php echo $products_ids;?>&idtransaction=<?php echo $insert_id;?>"></script>
