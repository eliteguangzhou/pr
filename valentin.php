<?php
/*
  $Id: valentin.php,v 1.49 2003/06/09 22:35:33 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_VALENTIN);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_VALENTIN));
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
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->
    <td width="100%" class="col_center christmas">

<?php   /*  require(DIR_WS_BOXES . 'panel_top.php');  */  ?>

<?php tep_draw_heading_top(901);?>

<?php new contentBoxHeading_ProdNew($info_box_contents);?>

<?php tep_draw_heading_top_3();?>

<?php
  $specials_query_raw = "select DISTINCT
    p.products_image,
    pd.products_name,
    pd.products_description,
    pd.Gamme,
    pd.Prix_conseille,
    pd.Type,
    pd.Gender,
    p.products_id,
    p.manufacturers_id,
    p.products_price,
    p.products_tax_class_id,
    IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price,
    IF(s.status, s.specials_new_products_price, p.products_price) as final_price,
    pd.Item_size,
    p.products_id,
    p.products_quantity,
    cd.categories_name
  from " . TABLE_SELECTIONS . " se,
    " . TABLE_CATEGORIES_DESCRIPTION . " cd,
    " . TABLE_PRODUCTS_DESCRIPTION . " pd,
    " . TABLE_PRODUCTS . " p
  left join " . TABLE_MANUFACTURERS . " m on
    p.manufacturers_id = m.manufacturers_id
  left join " . TABLE_SPECIALS . " s on
    p.products_id = s.products_id,
    " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
  where p.products_status = '1'
  and p.products_quantity > 2
  and p.products_id = p2c.products_id
  and pd.products_id = p2c.products_id
  and pd.language_id = '" . (int)$languages_id . "'
  and p.products_model = se.products_model
  and se.type= 'bons_plans'
  AND cd.language_id = ".(int)$languages_id."
  AND p2c.categories_id=cd.categories_id";

  $specials_split = new splitPageResults($specials_query_raw, MAX_DISPLAY_SPECIAL_PRODUCTS);

  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '2'))) {
?>
<?php echo tep_draw_result_top_1(); ?>
		<table border="0" width="100%" cellspacing="0" cellpadding="0" class="result box_width_cont">
          <tr>
            <td><?php echo $specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS); ?></td>
            <td class="result_right"><?php echo TEXT_RESULT_PAGE . ' ' . $specials_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
          </tr>
        </table>
<?php echo tep_draw_result_bottom_1(); ?>
<?php echo tep_draw_result_top(); ?>

<?php
  }
?>

<?php
    $row = 0;
    $specials_query = tep_db_query($specials_split->sql_query);

  $row = 0;
  $col = 0;
  $info_box_contents = array();
   while ($specials = tep_db_fetch_array($specials_query)) {
    $specials['products_name'] = tep_get_products_name($specials['products_id']);
// ----------
	//$product_query = tep_db_query("select products_description, pd.products_id, pd.Brand, pd.Gender, pd.Gamme, pd.Prix_achat, pd.Note, pd.Annee, pd.Item_size, pd.Prix_conseille, pd.Type, round(100 - products_price * 100 / ((Prix_conseille+18)*1.2)) as discount from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p  where pd.products_id = p.products_id and pd.products_id = '" . (int)$specials['products_id'] . "' and language_id = '" . (int)$languages_id . "'");
	$product = $specials;//tep_db_fetch_array($product_query);

  $p_id = $product['products_id'];

	$link = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $specials['products_id'].rewrite_product($specials));

  $p_pic = '<a href="' . $link . '">' . tep_image(DIR_WS_PWS_IMAGE . $specials['products_image'], $specials['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>';

	$p_name = '<a href="' . $link . '">' .display_product_name($specials['products_name'], $product)  .'</a>';

	$p_price = '<span class="productSpecialPrice">'.$currencies->display_price($specials['products_price'],'').'</span>';
    $has_discount = !empty($product['discount']) && $product['discount'] > 0;
// ----------
    $info_box_contents[$row][$col] = array('align' => 'center',
                                           'params' => 'style="width:33%;"',
                                           'text' => '
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="height:86px;">'.tep_draw_prod_pic_top().''.$p_pic.''.tep_draw_prod_pic_bottom().'</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #FFFFFF; border-width:0 5px 0 0;">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="height:40px " class="vam"'.($has_discount ? ' colspan="2"' : '').'><span>'.$p_name.'</span></td>
                                </tr>
                                <tr>
                                    <td class="vam products_price">'.$p_price.($has_discount ? '</td><td class="flash_discount" rowspan="2">-'.$product['discount'].'%</td>' : '').'
                                </tr>
                                '.(
                                $specials['products_quantity'] > 0
                                ? '<tr><td class="en_stock">'.TEXT_EN_STOCK.'</td></tr>'
                                : ''
                                ).'
                            </table>
                        </td>
                    </tr>
                </table>');

    $col ++;
    if ($col > 2) {
      $col = 0;
      $row ++;
    }
  }

  new contentBox($info_box_contents);

?>


<?php
  if (($specials_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
<?php echo tep_draw_result_bottom(); ?>
<?php echo tep_draw_result_top_2(); ?>
     	<table border="0" cellspacing="0" cellpadding="0" class="result box_width_cont">
          <tr>
            <td><?php echo $specials_split->display_count(TEXT_DISPLAY_NUMBER_OF_SPECIALS); ?></td>
            <td class="result_right"><?php echo TEXT_RESULT_PAGE . ' ' . $specials_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
          </tr>
        </table>
<?php echo tep_draw_result_bottom_2(); ?>
<?php
  }
?>

<?php tep_draw_heading_bottom_3();?>

<?php tep_draw_heading_bottom();?>

	</td>
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
<!-- footer_eof //--></body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
