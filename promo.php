<?php
/*
  $Id: shipping.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
if (!isset($promo_index)) {
  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PROMO);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PROMO));
  
  $error = false;
  if (isset($_GET['pack'])) {
    $pack = (int) $_GET['pack'];
    
    //Si pack connu
    if ($pack > 0) {
      $query = 'SELECT p.products_id, p.products_quantity, pa.is_gift
        FROM '.TABLE_PACKS.' pa
        LEFT JOIN '.TABLE_PRODUCTS.' p ON (
              p.products_model = pa.products_model
          AND p.products_status = 1
          AND p.products_quantity > 2
        )
        WHERE pa.pack_num = '.$pack;

      //On check les stocks de chaque produit du pack
      $query = tep_db_query($query);
      $products = array();
      while($rs = tep_db_fetch_array($query))
        if (is_null($rs['products_id'])) {
          $messageStack->add('promo', PACK_NUM_FINISHED);
          $error = true;
        }
        else
          $products[$rs['products_id']] = $rs['is_gift'];
          
      //Si assez de stock
      if ($error === false) {
        reset($cart->contents);
        while(list($index, $content) = each($cart->contents))
          if (strpos($index, 'gift_pack') !== false)
            $messageStack->add('promo', ALREADY_HAVE_PACK);

        if ($error === false) {
          reset($products);
          while(list($products_id, $is_gift) = each($products))
            $cart->add_cart($products_id, 1, '', true, $is_gift ? 'pack_'.$pack : false);

          $messageStack->add_session('cart', PACK_ADDED);
          tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
        }
      }
    }
    else
      $messageStack->add('promo', PACK_NUM_UNKNOWN);
  }
  

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
	<td>

<?php } else
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PROMO);
?>
  <table border="0" width="100%" cellspacing="0" cellpadding="2">
    <?php
    if ($messageStack->size('promo') > 0) {
    ?>
      <tr>
        <td><?php echo $messageStack->output('promo'); ?></td>
      </tr>
    <?php
      }
    ?>
	  <tr>
		<td class="main">
    <?php
      echo TEXT_INFORMATION;
      
      $query = tep_db_query('SELECT
        p.products_id,
        p.products_model,
        p.products_image,
        pd.products_name,
        pd.products_description,
        pd.Item_size,
        p.products_price,
        pd.Gender,
        p.item_size,
        cd.categories_name,
        pa.is_gift,
        pa.pack_num
      FROM
        '.TABLE_PRODUCTS.' p,
        '.TABLE_PRODUCTS_DESCRIPTION.' pd,
        '.TABLE_PACKS.' pa,
        ' . TABLE_CATEGORIES_DESCRIPTION . ' cd,
        ' . TABLE_PRODUCTS_TO_CATEGORIES . ' p2c,
        ( SELECT pack_num
          FROM '.TABLE_PACKS.' pa1
          LEFT JOIN '.TABLE_PRODUCTS.' p1 ON (
                p1.products_model = pa1.products_model
            AND p1.products_status = 1
            AND p1.products_quantity > 2
          )
          GROUP BY pack_num
          HAVING count(p1.products_id) = count(pa1.pack_id)
        ) as pa2
      WHERE pd.products_id = p.products_id
      and pd.language_id = '.(int)$languages_id.'
      and pa.products_model = p.products_model
      AND cd.language_id = '.(int)$languages_id.'
      AND p2c.products_id=p.products_id
      AND p2c.categories_id=cd.categories_id
      AND p.products_quantity > 2
      AND pa2.pack_num = pa.pack_num
      ORDER BY pa.pack_num ASC, pa.is_gift ASC
      ');

      $packs = array();
      $c_pack = 0;
      while ($product = tep_db_fetch_array($query)) {
        $p_desc = substr(strip_tags($product['products_description']), 0, MAX_DESCR_1) . '<br />' .strip_tags($product['Item_size']). '<br />[' . strip_tags($product['products_id']) . ']';

      	$link = tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product['products_id'].rewrite_product($product));

        $p_pic = '<a href="'.$link.'">' . tep_image(DIR_WS_PWS_IMAGE . $product['products_image'], $product['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>';

      	$p_name = '<a href="'.$link.'">' .display_product_name($product['products_name'], $product)  .'</a>';

        if ($c_pack > 0 && $c_pack != $product['pack_num'])
          $packs[$c_pack] .= '</tr></table>';

        $c_pack = $product['pack_num'];

        if (!isset($packs[$c_pack]))
          $packs[$c_pack] = '<table cellpadding="0" cellspacing="0" border="0"><tr>';
        elseif ($product['is_gift'])
          $packs[$c_pack] .= '<td class="operator">=</td>';
        else
          $packs[$c_pack] .= '<td class="operator">+</td>';

        $packs[$c_pack] .= '
          <td style="width:20%;">
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td colspan="2" class="your_gift">'.($product['is_gift'] ? YOUR_GIFT : '&nbsp;').'</td>
            </tr>
            <tr>
                    <td style="height:86px;">'.tep_draw_prod_pic_top().''.$p_pic.''.tep_draw_prod_pic_bottom().'</td>
                    <td class="products_gender">'.display_gender($product['Gender'], false).'</td>
                </tr>
                <tr>
                    <td style="border:1px solid #FFFFFF; border-width:0 5px 0 0;" colspan="2">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr><td style="height:40px " class="vam">'.$p_name.'</td></tr>
                            <tr><td class="productsPromo">
                            '.($product['is_gift']
                            ? TEXT_VALEUR.' : '
                            : ''
                            ).
                        $currencies->display_price($product['products_price']).'</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
          </td>';
      }
      
      if (!empty($c_pack))
        $packs[$c_pack] .= '</tr></table>';

      $row = 0;
      $info_box_contents = array();
      reset($packs);
      $j = 1;
      while(list($pack_num, $str) = each($packs)) {
        $info_box_contents[$row++][0] = array('align' => 'center',
                                               'params' => 'class="pack_num"',
                                               'text' => '<br /><br /><br /><br /><br />'.PACK_NUMBER.($j++)
        );
        $info_box_contents[$row++][0] = array('align' => 'center',
                                               'params' => '',
                                               'text' => $str
        );
        $info_box_contents[$row++][0] = array('align' => 'center',
                                               'params' => '',
                                               'text' => '<a href="'.tep_href_link(FILENAME_PROMO, 'pack='.$pack_num).'">'.tep_image_submit('button_add_to_cart1.gif', IMAGE_BUTTON_IN_CART).'</a>',
        );
      }
      new contentBox($info_box_contents);
    ?>

    </td>
	  </tr>
	</table>

<?php if (!isset($promo_index)) { ?>

  </td>
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
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); } ?>
