<?php
/*
  $Id: index.php,v 1.1 2003/06/11 17:37:59 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
// the following cPath references come from application_top.php
  $category_depth = 'top';
  if (isset($cPath) && tep_not_null($cPath)) {
    $categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
    $cateqories_products = tep_db_fetch_array($categories_products_query);
    if ($cateqories_products['total'] > 0) {
      $category_depth = 'products'; // display gammes
    } else {
      $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");
      $category_parent = tep_db_fetch_array($category_parent_query);
      if ($category_parent['total'] > 0) {
        $category_depth = 'nested'; // navigate through the categories
      } else {
        $category_depth = 'products'; // category has no gammes, but display the 'no gammes' message
      }
    }
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);
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
    <td valign="top" class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->
<?php 
  if ($category_depth == 'nested') {
    $category_query = tep_db_query("select cd.categories_name, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");
    $category = tep_db_fetch_array($category_query);
?>
    <td width="100%" class="col_center">
	
	
<?php  tep_draw_heading_top($cPath);?>
	  
<?php new contentBoxHeading_ProdNew($info_box_contents);?>

<?php  tep_draw_heading_top_3();?>

		
					<table border="0" cellspacing="0" cellpadding="0" align="center" class="box_width_cont product">
                        <tr>
                            <td colspan="<?php echo MAX_DISPLAY_CATEGORIES_PER_ROW; ?>">
                                <?php echo CHOOSE_YOUR_CAT; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="<?php echo MAX_DISPLAY_CATEGORIES_PER_ROW; ?>" height="10"> &nbsp;</td>
                        </tr>
						<tr>
<?php
	if (isset($cPath) && strpos('_', $cPath)) {
// check to see if there are deeper categories within the current category
	  $category_links = array_reverse($cPath_array);
	  for($i=0, $n=sizeof($category_links); $i<$n; $i++) {
		$categories_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
		$categories = tep_db_fetch_array($categories_query);
		
		if ($categories['total'] < 1) {
		  // do nothing, go through the loop
		} else {
		  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
		  break; // we've found the deepest category the customer is in
		}
	  }
	} else {
	  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
	}

	$number_of_categories = tep_db_num_rows($categories_query);
	$rows = 0;
	while ($categories = tep_db_fetch_array($categories_query)) {
	
	  $rows++;
	  $cPath_new = tep_get_path($categories['categories_id']);

    $p_pic_sub = '<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . tep_image(DIR_WS_IMAGES . $categories['categories_image'], $categories['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT) . '</a>';

    $p_name_sub = '<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . $categories['categories_name'] . '</a>';
	  
	  $width = (int)(100 / MAX_DISPLAY_CATEGORIES_PER_ROW) . '%';
	  echo '               
	  
		<td align="center" width="' . $width . '">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td align="center">'.
                                        ($check_server == 'fr' ? tep_draw_prod_pic_top().''.$p_pic_sub.''.tep_draw_prod_pic_bottom() : '').'
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td class="vam" style="height:50px " align="center"><span>'.$p_name_sub.'</span></td>
                                            </tr>
                                        </table> 
                                    </td>
                                </tr>
                            </table> 
		</td>
	  ' . "\n";
				  if ($col!=(MAX_DISPLAY_CATEGORIES_PER_ROW-1)){
				  echo '
						<td>'.tep_draw_separator('spacer.gif', '1', '1').'</td>					
						';
				  }
				 else{	
				 		      
	  if ((($rows / MAX_DISPLAY_CATEGORIES_PER_ROW) == floor($rows / MAX_DISPLAY_CATEGORIES_PER_ROW)) && ($rows != $number_of_categories)) {
		echo '              
	</tr><tr><td colspan="'.(MAX_DISPLAY_CATEGORIES_PER_ROW + MAX_DISPLAY_CATEGORIES_PER_ROW -1).'">'.tep_draw_separator('spacer.gif', '1', '10').'</td></tr>' . "\n";
		echo '              <tr>' . "\n";
	  }
	}
	if ($col==MAX_DISPLAY_CATEGORIES_PER_ROW-1){
	$col=0;
	}else{
	$col++;
	}
}	

// needed for the new products module shown below
	$new_products_category_id = $current_category_id;
?>					
					
				</table>
				
<?php  tep_draw_heading_bottom_3();?>
				
<?php  tep_draw_heading_bottom();  ?>

	</td>
<?php
  } elseif ($category_depth == 'products' || isset($HTTP_GET_VARS['manufacturers_id'])) {
// create column list
    $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
                         'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
                         'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,
                         'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,
                         'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,
                         'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,
                         'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,
                         'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);

    asort($define_list);

    $column_list = array();
    reset($define_list);
    while (list($key, $value) = each($define_list)) {
      if ($value > 0) $column_list[] = $key;
    }

    $select_column_list = '';

    for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
      switch ($column_list[$i]) {
        case 'PRODUCT_LIST_MODEL':
          $select_column_list .= 'p.products_model, ';
          break;
        case 'PRODUCT_LIST_NAME':
          $select_column_list .= 'pd.products_name, ';
          break;
        case 'PRODUCT_LIST_MANUFACTURER':
          $select_column_list .= 'm.manufacturers_name, ';
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $select_column_list .= 'p.products_quantity, ';
          break;
        case 'PRODUCT_LIST_IMAGE':
          $select_column_list .= 'p.products_image, ';
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $select_column_list .= 'p.products_weight, ';
          break;
      }
    }
    
//si un seul des parametres est envoy�
// show the products of a specified manufacturer
    if (isset($HTTP_GET_VARS['manufacturers_id'])) {
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only a specific category
        $from = " from " . TABLE_PRODUCTS . " p
          left join " . TABLE_SPECIALS . " s on
            p.products_id = s.products_id,
          " . TABLE_PRODUCTS_DESCRIPTION . " pd,
          " . TABLE_MANUFACTURERS . " m,
          " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c,
          " . TABLE_CATEGORIES_DESCRIPTION . " cd";
        $where = "p.manufacturers_id = m.manufacturers_id
          and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
          and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
      } else {
// We show them all
        $from = " from " . TABLE_PRODUCTS . " p
          left join " . TABLE_SPECIALS . " s on
            p.products_id = s.products_id,
          " . TABLE_PRODUCTS_DESCRIPTION . " pd,
          " . TABLE_MANUFACTURERS . " m,
          " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c,
          " . TABLE_CATEGORIES_DESCRIPTION . " cd";
        $where = "p.manufacturers_id = m.manufacturers_id
          and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
      }
    } else {
// show the products in a given categorie
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only specific catgeory
        $from = " from " . TABLE_PRODUCTS . " p
          left join " . TABLE_SPECIALS . " s on
            p.products_id = s.products_id,
          " . TABLE_PRODUCTS_DESCRIPTION . " pd,
          " . TABLE_MANUFACTURERS . " m,
          " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c,
          " . TABLE_CATEGORIES_DESCRIPTION . " cd";
        $where = "p.manufacturers_id = m.manufacturers_id
          and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'
          and p2c.categories_id = '" . (int)$current_category_id ."'";
      } else {
// We show them all
        $from = " from " . TABLE_PRODUCTS_DESCRIPTION . " pd,
          " . TABLE_PRODUCTS . " p
          left join " . TABLE_MANUFACTURERS . " m on
            p.manufacturers_id = m.manufacturers_id
          left join " . TABLE_SPECIALS . " s on
            p.products_id = s.products_id,
          " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c,
          " . TABLE_CATEGORIES_DESCRIPTION . " cd";
        $where = "p2c.categories_id = '" . (int)$current_category_id . "'";
      }
    }

    $listing_sql = "select DISTINCT
      ".(!empty($display_type) ? 'MIN(p.products_price) as min_price,' : '')."
      pd.Gamme,
      pd.Prix_conseille,
      pd.Brand,
      pd.Prix_achat,
      pd.Type,
      pd.Gender,
      pd.Item_size,
      p.item_size,
      pd.Note,
      pd.Annee,
      pd.products_description,
      " . $select_column_list . "
      p.products_id,
      p.products_quantity,
      p.manufacturers_id,
      p.products_price,
      p.products_tax_class_id,
      cd.categories_name,
      pd.products_name,
      p2c.categories_id,
      IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price,
      IF(s.status, s.specials_new_products_price, p.products_price) as final_price" .
      $from . "
      WHERE ".$where."
      and p.products_status = '1'
      and p.products_quantity > 2
      and pd.products_id = p.products_id
      and pd.language_id = '" . (int)$languages_id . "'
      and p.products_id = p2c.products_id
      AND cd.language_id = ".(int)$languages_id."
      AND p2c.categories_id=cd.categories_id
      ".$range_where."
      " . $display_type;
      
    if ( (!isset($HTTP_GET_VARS['sort'])) || (!ereg('^[1-8][ad]$', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {
      for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
        if ($column_list[$i] == 'PRODUCT_LIST_NAME') {
          $HTTP_GET_VARS['sort'] = $i+1 . 'a';
          $listing_sql .= " order by pd.products_name";
          break;
        }
      }
    } else {
      $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
      $sort_order = substr($HTTP_GET_VARS['sort'], 1);

      switch ($column_list[$sort_col-1]) {
        case 'PRODUCT_LIST_MODEL':
          $listing_sql .= " order by p.products_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_NAME':
          $listing_sql .= " order by pd.products_name " . ($sort_order == 'd' ? 'desc' : '');
          break;
        case 'PRODUCT_LIST_MANUFACTURER':
          $listing_sql .= " order by m.manufacturers_name " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $listing_sql .= " order by p.products_quantity " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_IMAGE':
          $listing_sql .= " order by pd.products_name";
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $listing_sql .= " order by p.products_weight " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_PRICE':
          $listing_sql .= " order by final_price " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
      }
    }
?>
    <td width="100%" class="col_center">

<?php tep_draw_heading_top($cPath);?>

<?php
// Get the right image for the top-right
    $image = DIR_WS_IMAGES . 'table_background_list.gif';
    if (isset($HTTP_GET_VARS['manufacturers_id'])) {
      $image = tep_db_query("select manufacturers_image from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");
      $image = tep_db_fetch_array($image);
      $image = $image['manufacturers_image'];
    } elseif ($current_category_id) {
      $image = tep_db_query("select categories_image from " . TABLE_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
      $image = tep_db_fetch_array($image);
      $image = $image['categories_image'];
    }

  if ((isset($HTTP_GET_VARS['filter_id']))||(isset($HTTP_GET_VARS['manufacturers_id'])))
	 include(DIR_WS_MODULES . ( empty($display_type) ? FILENAME_PRODUCT_LISTING : FILENAME_RANGE_LISTING));

  require(DIR_WS_BOXES.'display_list.php');

?>		

<?php tep_draw_heading_bottom_3();?>

<?php tep_draw_heading_bottom();?>		
		
	  </td>
<?php

  } else { // default page
?>
    <td width="100%" class="col_center" >

<?php if (1){//$check_server != 'fr') { ?>

<?php tep_draw_heading_top($cPath);?>

<?php if ($check_server == 'fr') { ?>

<p style="padding-top:1px;font-family:verdana;"><?php  echo nl2br(NEW_INTRO);?></p>

<?php } else {
    if (file_exists(DIR_WS_IMAGES.'entete.jpg'))
        echo tep_image(DIR_WS_IMAGES.'entete.jpg');
} ?>

<?php   new contentBoxHeading_ProdNew($info_box_contents);  ?>

<?php tep_draw_heading_top_3();?>
		
<?php include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?>

	    	   
<?php tep_draw_heading_bottom_3();?>

<?php tep_draw_heading_bottom();?>

<?php } else { ?>

<?php $promo_index = true; include(FILENAME_PROMO); ?>

<?php } ?>

		</td>
<?php
  }
?>
<!-- body_text_eof //-->
    <td class="col_right">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </td>
  </tr>
</table>
<?php if ($check_server == 'fr') { ?>
<script src="http://nxtck.com/act.php?zid=15883"></script>
<?php } ?>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //--></body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
<?php if ($current_category_id == 0) :?>
<script type="text/javascript" src="http://img.netaffiliation.com/u/31/p13233.js?zone=accueil"></script>
<?php else : ?>
<script type="text/javascript" src="http://img.netaffiliation.com/u/331/p13233.js?zone=categorie&idcategorie=<?php echo $current_category_id; ?>"></script>
<?php endif; ?>