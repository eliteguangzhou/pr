<?php
/*
  $Id: shipping.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADVANTAGES);

  //Recuperation des produits cadeaux
  /*$product_query = tep_db_query('select p.products_id, p.products_quantity, p.products_image, p.products_tax_class_id, pd.products_name, p.products_price, p2c.categories_id, products_description, pd.Brand, pd.Gender, pd.Gamme, pd.Prix_conseille, pd.Type, pd.Prix_achat, pd.Note, pd.Annee, pd.Item_size from ' . TABLE_PRODUCTS . ' p, ' . TABLE_PRODUCTS_DESCRIPTION . ' pd, ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c, ' . TABLE_GIFTS . ' g where g.products_model = p.products_model and g.gifts_status = 1 and p.products_id = p2c.products_id and p.products_status = "1" and p.products_id = pd.products_id and pd.language_id = "' . (int)$languages_id . '" AND p.products_model IN ('.GIFT_MODELS.')');
  $info_box_contents2 = array();
  $info_box_contents3 = array();
  $row = 0;
  $col = 0;
  $gifts = array();
  while($product = tep_db_fetch_array($product_query)) {
    $gifts[] = $product['products_id'];
    $p_pic = tep_image(DIR_WS_PWS_IMAGE . $product['products_image'], $product['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);

    $p_name = display_product_name($product['products_name'] , $product);

    $info_box_contents2[$row][$col] = array('align' => 'center',
                                           'params' => 'style="width:34%;"',
                                           'text' => '
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="height:86px;">'.tep_draw_prod_pic_top().''.$p_pic.''.tep_draw_prod_pic_bottom().'</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #FFFFFF; border-width:0 15px 0 0px;">
                            '.$p_name.'
                        </td>
                    </tr>
                </table>');

    $col ++;
    if ($col > 2) {
      $col = 0;
      $row ++;
    }
  }
  */
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_ADVANTAGES));
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<?php require_once(DIR_WS_INCLUDES.'head.php'); ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
  	<td class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
	</td>
<!-- body_text //-->
    <td width="100%" class="col_center">
		<table border="0" width="100%" cellspacing="0" cellpadding="0">

		<tr><td>

<?php tep_draw_heading_top(901);?>

<?php //new contentBoxHeading_ProdNew($info_box_contents);?>

<?php tep_draw_heading_top_1();?>

      <table cellpadding="0" cellspacing="0" border="0" width="100%">
				  <tr>
					<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
				  </tr>
				  <tr>
					<td><table border="0" width="100%" cellspacing="0" cellpadding="2">
					  <tr>
						<td class="main"><?php echo TEXT_INFORMATION; /*new contentBox($info_box_contents2, false);*/?></td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
				  </tr>
	  </table>


<?php tep_draw_heading_bottom_1();?>

<?php tep_draw_heading_bottom();?>

			</td></tr>
		</table>
	</form></td>

<!-- body_text_eof //-->
    <td class="col_right">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </td>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
<img width="0" height="0" src="http://ext.trackingwiz.com/Aspx/pixel.aspx?tpid=i10930e0c"/>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
