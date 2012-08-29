<tr><td>
<?php

$usage="";
$titrepave="";

switch ($current_category_id) {
  case 47:
  case 34:
  case 27:
    $usage="besthim";
    $titrepave=Our_Best_P_Him;
    break;
  case 33:
  case 36:
  case 40:
    $usage="bestskincare";
    $titrepave=Skin_Care;
    break;
  case 31:
  case 32:
  case 38:
  case 28:
  case 37:
  case 30:
  case 35:
  case 48:
  case 53:
    $usage="besther";
    $titrepave=Our_Best_P_Her;
    break;
  case 39:
  case 49:
    $usage="bestgifsetw";
    $titrepave=Nos_meilleurs_coffrets_w;
    break;
  case 50:
    $usage="bestgifsetm";
    $titrepave=Nos_meilleurs_coffrets_m;
    break;
}

if (!empty($usage)){
	$best_sellers_query = tep_db_query("SELECT distinct
    pd.products_name,
    pd.products_id,
    pd.products_description,
    pd.item_size,
    cd.categories_name
  FROM
    ".TABLE_STATIQUE_BEST_SELLER." sbs,
    ".TABLE_PRODUCTS."  p,
    ".TABLE_PRODUCTS_DESCRIPTION." pd,
    ".TABLE_CATEGORIES_DESCRIPTION." cd,
    ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
  where sbs.usage like '".$usage."'
  AND p.products_model = sbs.products_model
  AND pd.products_id=p.products_id
  AND pd.language_id = ".(int)$languages_id."
  AND cd.language_id = ".(int)$languages_id."
  AND p2c.products_id=p.products_id
  AND p2c.categories_id=cd.categories_id
  order by ordre
  LIMIT 0 , 30");

  $str = '<ul>';
	while($products = tep_db_fetch_array($best_sellers_query))
    $str .= '<li class="bg_list"><a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id='.$products['products_id'].rewrite_product($products)).'">'.$products['products_name'].'</a>';
  $str .= '</ul>';

  $info_box_contents = array();
  $info_box_contents[] = array('text' => $titrepave);
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('text' => $str);
  new infoBox($info_box_contents);
}

?>
</td></tr>