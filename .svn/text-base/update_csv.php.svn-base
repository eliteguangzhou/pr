<?php
/*
  $Id: categories.php 1755 2007-12-21 14:02:36Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

  ini_set('display_errors', true);
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
define('PRICE_DE' ,1.25);
define('PRICE_US' ,14);

//if (!empty($_POST) && $_POST['log23'] = 'admin' && $_POST['pass97'] == 'CurL2010') {
    require('includes/application_top.php');

    //***************************************
    //CSV SHOPPING.COM
    //***************************************
    $fields = array (
        'MPN' => 'products_model',
        'Marque / Fabriquant' => 'm.manufacturers_name as manufacturer',
        'EAN / UPC' => 'products_model as model',
        'Référence Interne' => 'products_model as intern',
        'Nom du produit' => 'CONCAT(products_name, " - ", products_description) as products_name',
        'Description du produit' => 'products_description',
        'Prix' => 'products_price',
        'Expedition standard' => "'14'",
        'Disponibilité' => 'IF(products_status, "O", "N") as products_status',
        'Description de la disponibilité + garantie' => "'Livraison sous 8 à 12 jours ouvrables'",
        'URL produit' => "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', p.products_id)",
        'URL image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Catégorie' => 'p.type as cat',
        'Type' => 'p.type as Type',
        'Sexe' => 'p.gender as Gender'
    );

    $cat = array(
        'Shampoo' => 'Santé et beauté > Parfum',
        'Conditioner' => 'Santé et beauté > Parfum',
        'Fragrances' => 'Santé et beauté > Parfum',
        'Bath & Body' => 'Santé et beauté > Parfum',
        'Gift Sets' => 'Santé et beauté > Parfum',
        'Gift Set' => 'Santé et beauté > Parfum'
    );

    $type = array(
        'Shampoo' => 'Shampooings',
        'Conditioner' => 'Conditionneur',
        'Fragrances' => 'Parfum',
        'Bath & Body' => 'Bain et corps',
        'Gift Sets' => 'Coffret',
        'Gift Set' => 'Coffret'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");
		
    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['cat'] = $cat[$data['cat']];
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join('|', $data);
        if (stripos($data['products_description'], 'vaporisateur') !== false) {
          $data['products_name'] = str_ireplace('vaporisateur', 'spray', $data['products_name']);
          $data['products_description'] = str_ireplace('vaporisateur', 'spray', $data['products_description']);
          $data['model'] = $data['model'] . '1';
          $data['intern'] = $data['intern'] . '1';
          $data['products_model'] = $data['products_model'] . '1';
          $datas .= "\r\n".join('|', $data);
        }
    }
    $file = 'download/csv/shopping_fr.csv';
    if (file_put_contents($file, $datas)) echo 'CSV fr.Shopping.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV fr.Shopping.com</div><br />';

    //***************************************
    //CSV SHOPZILLA.com
    //***************************************
    $fields = array (
        'Catégorie' => 'p.type as Type',
        'Fabriquant' => 'm.manufacturers_name as manufacturer',
        'Titre' => 'CONCAT(products_name, " - ", products_description) as products_name',
        'Desc' => 'products_description',
        'Lien' => "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', p.products_id)",
        'Image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'SKU' => 'products_model',
        'Stock' => 'products_quantity',
        'Condition' => "'' as cond",
        'Poids' => "'' as poids",
        'Frais de Livraison' => "'' as frais",
        'Enchère' => "'' as enchere",
        'Promo' => "'' as promo",
        'EAN/UPC' => 'products_model as upc',
        'Prix' => 'products_price'
    );

    $type = array(
        'Shampoo' =>  	'14.560',
        'Conditioner' => '14.570',
        'Fragrances' => '14.539',
        'Bath & Body' => '14.570',
        'Gift Sets' => '15.289',
        'Gift Set' => '15.289'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, products_to_categories ptc, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
        and ptc.products_id = p.products_id
        and ptc.categories_id != 35
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join(chr(9), array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join(chr(9), $data);
        if (stripos($data['products_description'], 'vaporisateur') !== false) {
          $data['products_description'] = str_ireplace('vaporisateur', 'spray', $data['products_description']);
          $data['products_name'] = str_ireplace('vaporisateur', 'spray', $data['products_name']);
          $data['upc'] = $data['upc'] . '1';
          $data['products_model'] = $data['products_model'] . '1';
          $datas .= "\r\n".join(chr(9), $data);
        }
    }
    $file = 'download/csv/shopzilla.csv';
    if (file_put_contents($file, $datas)) echo 'CSV Shopzilla.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV Shopzilla.com</div><br />';

    //***************************************
    //CSV BIZRATE.com (shopzilla us)
    //***************************************
    $fields = array (
        'Category ID' => 'p.type as Type',
        'Manufacturer' => 'm.manufacturers_name as manufacturer',
        'Title' => 'products_name',
        'Description' => 'products_description',
        'Product URL' => "CONCAT('http://www.fragrancelover.com/product_info.php?products_id=', p.products_id)",
        'Image URL' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'SKU' => 'products_model',
        'Availability' => 'products_quantity',
        'Condition' => "'' as cond",
        'Ship Weight' => "'' as poids",
        'Ship Cost' => "'14' as frais",
        'Bid' => "'' as enchere",
        'Promotional Code' => "'' as promo",
        'UPC' => 'products_model as upc',
        'Price' => 'products_price'
    );

    $type = array(
        'Shampoo' =>  	' 	100,000,496',
        'Conditioner' => '100,000,497',
        'Fragrances' => '88',
        'Bath & Body' => ' 8,771',
        'Gift Sets' => '88',
        'Gift Set' => '88'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields).",
        p.buy_price
        FROM `products` p, products_description pd, products_to_categories ptc, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
        and ptc.products_id = p.products_id
        and ptc.categories_id != 35
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join(chr(9), array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = $data['buy_price'] + PRICE_US;
        unset($data['buy_price']);
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join(chr(9), $data);
    }
    $file = 'download/csv/bizrate.csv';
    if (file_put_contents($file, $datas)) echo 'CSV bizrate.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV bizrate.com</div><br />';

    //***************************************
    //CSV spardeingeld.de
    //***************************************

    $fields = array (
        'Kategorie' => 'p.type as Type',
        'Hersteller' => 'm.manufacturers_name as manufacturer',
        'Bezeichnung' => 'CONCAT(products_name, " - ", products_description) as products_name',
        'Beschreibung' => 'products_description',
        'Artikel-URL' => "CONCAT('http://www.parfumfrankreich.com/product_info.php?products_id=', p.products_id)",
        'Bild-URL' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'SKU' => 'products_model',
        'Bestand' => 'products_quantity',
        'Zustand' => "'' as cond",
        'Versandgewicht' => "'' as poids",
        'Versandkosten' => "'' as frais",
        'Gebot' => "'' as enchere",
        'Werbetext' => "'' as promo",
        'EAN/UPC' => 'products_model as upc',
        'Preis' => 'products_price'
    );

    $type = array(
        'Shampoo' =>  	'15.817',
        'Conditioner' => '15.817',
        'Fragrances' => '15.796',
        'Bath & Body' => '15.827',
        'Gift Sets' => '16.546',
        'Gift Set' => '16.546'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join(chr(9), array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*get_price2($data['products_price'], PRICE_DE)*100)/100;
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join(chr(9), $data);
    }
    $file = 'download/csv/spardeingeld.csv';
    if (file_put_contents($file, $datas)) echo 'CSV Spardeingeld.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV Spardeingeld.com</div><br />';

    /**********************
     *   Netaffiliation   *
     **********************/

    $fields = array (
        'p.products_id',
        'products_quantity',
        'products_model',
        'products_price',
        'products_status',
        'products_ordered',
        'products_name',
        'products_description',
        'products_viewed',
        'm.manufacturers_name as marque',
        'p.gender as Gender',
        'p.gamme',
        'p.item_size',
        'p.type as Type',
        'products_image',
        'pd.products_id',
        'products_model as EAN',
        '14 as frais_port',
    );

    $query = tep_db_query("
        SELECT ".str_replace('products_name', 'CONCAT(products_name, " ", products_model)',
                str_replace('products_image', "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
                str_replace('pd.products_id', "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', pd.products_id)",
                join(',', $fields))))."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
        and m.manufacturers_id = p.manufacturers_id
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");
    $datas = '"'.str_replace('products_model as EAN', 'EAN', str_replace('14 as frais_port', 'frais_port', join('";"', $fields))).'"';
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['item_size'] = str_replace(chr(13), '', $data['item_size']);
        $datas .= "\r\n".'"'.join('";"', $data).'"';
		
        if (stripos($data['products_description'], 'vaporisateur') !== false) {
          $data['CONCAT(products_name, " ", products_model)'] = str_ireplace('vaporisateur', 'spray', $data['CONCAT(products_name, " ", products_model)']) . '1';
          $data['products_description'] = str_ireplace('vaporisateur', 'spray', $data['products_description']);
          $data['products_model'] = $data['products_model'] . '1';
          $data['EAN'] = $data['EAN'] . '1';
          $data['products_id'] = $data['products_id'] . '1';
          $datas .= "\r\n".'"'.join('";"', $data).'"';
        }
    }
    $file = 'download/csv/netaffiliation.csv';
    $datas = utf8_encode($datas);
    file_put_contents($file, $datas);
    echo 'CSV Netaffiliation mis a jour <br />';

    //CSV CIAO.FR
    $fields = array (
        'Name' => 'products_name',
        'Brand' => 'manufacturers_name as brand',
        'MPN/EAN/ISBN' => 'products_model',
        'URL' => "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', pd.products_id)",
        'ImageURL' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Price' => 'products_price',
        'Shipping Cost' => "'14 EUR'",
        'Delivery' => "'En stock; Livraison sous 8 à 12 jours ouvrables'",
        'Description' => 'products_description',
        'Category' => "CONCAT(p.type, '|', p.gender) as cat",
        'Vendor Code' => 'products_model as code',
        'Money' => "'EUR'"
    );

    $cat = array();
    $cat['Fragrances']['Hommes'] = "Beauté > Parfums > Parfums pour Homme";
    $cat['Fragrances']['Femmes'] = "Beauté > Parfums > Parfums pour Femme";
    $cat['Fragrances']['Unisex'] = "Beauté > Parfums > Eau de Parfum";
    $cat['Shampoo']['Hommes'] = "Beauté > Soin des cheveux > Shampooings et Après-shampooings";
    $cat['Shampoo']['Femmes'] = "Beauté > Soin des cheveux > Shampooings et Après-shampooings";
    $cat['Shampoo']['Unisex'] = "Beauté > Soin des cheveux > Shampooings et Après-shampooings";
    $cat['Bath & Body']['Hommes'] = "Beauté > Soin du corps > Bains et Douches";
    $cat['Bath & Body']['Femmes'] = "Beauté > Soin du corps > Bains et Douches";
    $cat['Bath & Body']['Unisex'] = "Beauté > Soin du corps > Bains et Douches";
    $cat['Conditioner']['Hommes'] = "Beauté > Soin des cheveux > Shampooings et Après-shampooings";
    $cat['Conditioner']['Femmes'] = "Beauté > Soin des cheveux > Shampooings et Après-shampooings";
    $cat['Conditioner']['Unisex'] = "Beauté > Soin des cheveux > Shampooings et Après-shampooings";
    $cat['Gift Sets']['Hommes'] = "Beauté > Produits de Beauté et Soin du Corps";
    $cat['Gift Sets']['Femmes'] = "Beauté > Produits de Beauté et Soin du Corps";
    $cat['Gift Sets']['Unisex'] = "Beauté > Produits de Beauté et Soin du Corps";
    $cat['Gift Set']['Hommes'] = "Beauté > Produits de Beauté et Soin du Corps";
    $cat['Gift Set']['Femmes'] = "Beauté > Produits de Beauté et Soin du Corps";
    $cat['Gift Set']['Unisex'] = "Beauté > Produits de Beauté et Soin du Corps";

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0");
    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $tmp = explode('|', $data['cat']);
        if (stristr($data['products_description'], 'eau de parfum'))
            $data['cat'] = "Beauté > Parfums > Eau de Parfum";
        elseif (stristr($data['products_description'], 'eau de cologne') || stristr($data['products_description'], 'eau de  cologne'))
            $data['cat'] = "Beauté > Parfums > Eau de Cologne";
        elseif (stristr($data['products_description'], 'eau de toilette'))
            $data['cat'] = "Beauté > Parfums > Eau de Toilette";
        else
            $data['cat'] = $cat[$tmp[0]][$tmp[1]];
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/ciao.csv';
    if (file_put_contents($file, $datas)) echo 'CSV Ciao.fr mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV Ciao.fr</div><br />';


    //***************************************
    //CSV CIAO.ES
    //***************************************

    $fields = array (
        'Name' => 'products_name',
        'Brand' => 'm.manufacturers_name as brand',
        'MPN/EAN/ISBN' => 'products_model',
        'URL' => "CONCAT('http://www.perfumesfrancia.com/product_info.php?products_id=', pd.products_id)",
        'ImageURL' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Price' => 'products_price',
        'Shipping Cost' => "'14 EUR'",
        'Delivery' => "'En la entrega de los artículos en cuestión de días 8 a 12 empresas'",
        'Description' => 'products_description',
        'Category' => "CONCAT(p.type, '|', p.gender) as cat",
        'Vendor Code' => 'products_model as code',
        'Money' => "'EUR'"
    );

    $cat = array();
    $cat['Fragrances']['Hommes'] = "Belleza > Perfumes > Perfumes para hombre";
    $cat['Fragrances']['Femmes'] = "Belleza > Perfumes > Perfumes para mujer";
    $cat['Fragrances']['Unisex'] = "Belleza > Perfumes > Eau de Parfum";
    $cat['Shampoo']['Hommes'] = "Belleza > Cuidado del cabello > Champús y Acondicionadores";
    $cat['Shampoo']['Femmes'] = "Belleza > Cuidado del cabello > Champús y Acondicionadores";
    $cat['Shampoo']['Unisex'] = "Belleza > Cuidado del cabello > Champús y Acondicionadores";
    $cat['Bath & Body']['Hommes'] = "Belleza > Cuerpo > Ducha y Baño";
    $cat['Bath & Body']['Femmes'] = "Belleza > Cuerpo > Ducha y Baño";
    $cat['Bath & Body']['Unisex'] = "Belleza > Cuerpo > Ducha y Baño";
    $cat['Conditioner']['Hommes'] = "Belleza > Cuidado del cabello > Champús y Acondicionadores";
    $cat['Conditioner']['Femmes'] = "Belleza > Cuidado del cabello > Champús y Acondicionadores";
    $cat['Conditioner']['Unisex'] = "Belleza > Cuidado del cabello > Champús y Acondicionadores";
    $cat['Gift Sets']['Hommes'] = "Belleza > Perfumes > Perfumes Sets";
    $cat['Gift Sets']['Femmes'] = "Belleza > Perfumes > Perfumes Sets";
    $cat['Gift Sets']['Unisex'] = "Belleza > Perfumes > Perfumes Sets";
    $cat['Gift Set']['Hommes'] = "Belleza > Perfumes > Perfumes Sets";
    $cat['Gift Set']['Femmes'] = "Belleza > Perfumes > Perfumes Sets";
    $cat['Gift Set']['Unisex'] = "Belleza > Perfumes > Perfumes Sets";

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 6
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");
    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $tmp = explode('|', $data['cat']);
        if (stristr($data['products_description'], 'eau de parfum'))
            $data['cat'] = "Belleza > Perfumes > Eau de Parfum";
        elseif (stristr($data['products_description'], 'aqua de colonia') || stristr($data['products_description'], 'aqua de  colonia'))
            $data['cat'] = "Belleza > Perfumes > Colonia";
        elseif (stristr($data['products_description'], 'eau de toilette'))
            $data['cat'] = "Belleza > Perfumes > Eau de Toilette";
        else
            $data['cat'] = $cat[$tmp[0]][$tmp[1]];
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/ciao_es.csv';
    if (file_put_contents($file, $datas)) echo 'CSV Ciao.es mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV Ciao.es</div><br />';


    //***************************************
    //CSV DE.SHOPPING.COM
    //***************************************
    $fields = array (
        'MPN' => 'products_model',
        'Hersteller' => 'm.manufacturers_name as manufacturer',
        'Händler - SKU' => 'products_model as model',
        'Produktname' => 'products_name',
        'Produktbeschreibung' => 'products_description',
        'Preis' => 'products_price',
        'Versandkosten' => "'14'",
        'Verfügbarkeit' => 'products_status',
        'Verfügbarkeitdetails' => "'Lieferung innerhalb von 8 bis 12 Werktagen'",
        'Produkt-URL' => "CONCAT('http://www.parfumfrankreich.com/product_info.php?products_id=', p.products_id)",
        'Produktbild-URL' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Kategoriename' => 'p.type as cat',
        'Unterkategorie' => 'p.type as Type',
        'Geschlecht' => 'p.gender'
    );

    $cat = array(
        'Shampoo' => 'Gesundheit und Kosmetik > Haarstyling',
        'Conditioner' => 'Gesundheit und Kosmetik > Haarstyling',
        'Fragrances' => 'Gesundheit und Kosmetik > Parfums',
        'Bath & Body' => 'Gesundheit und Kosmetik > Körpepflege',
        'Gift Sets' => 'Gesundheit und Kosmetik > Parfums',
        'Gift Set' => 'Gesundheit und Kosmetik > Parfums'
    );

    $type = array(
        'Shampoo' => 'Shampoo',
        'Conditioner' => 'After Shampoo',
        'Fragrances' => 'Parfums',
        'Bath & Body' => 'Bath and Body',
        'Gift Sets' => 'Feld',
        'Gift Set' => 'Feld'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 7
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*get_price2($data['products_price'], PRICE_DE)*100)/100;
        $data['cat'] = $cat[$data['cat']];
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/shopping_de.csv';
    if (file_put_contents($file, $datas)) echo 'CSV  de.Shopping.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV  de.Shopping.com</div><br />';


    //***************************************
    //CSV LEGUIDE.COM
    //***************************************
    $fields = array (
        'categorie' => 'p.type as Type',
        'identifiant_unique' => 'products_model',
        'titre' => 'products_name',
        'description' => 'products_description',
        'prix' => 'products_price',
        'URL_produit' => "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', p.products_id)",
        'URL_image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'frais_de_port' => "'14'",
        'disponibilite' => 'products_status',
        'delai_de_livraison' => "'Livraison sous 8 à 12 jours ouvrables'",
        'garantie' => '"0"',
        'reference_modele' => 'products_model as model',
        'marque' => 'p.brand'
    );

    $cat = array(
        'Shampoo' => 'Santé - Beauté > Beauté > Soins des cheveux > Shampoings',
        'Conditioner' => 'Santé - Beauté > Beauté > Soins des cheveux > Après-shampoings',
        'Fragrances' => 'Santé - Beauté > Beauté > Parfumerie > Parfums',
        'Bath & Body' => 'Santé - Beauté > Beauté > Soins du corps > Gels douche',
        'Gift Sets' => 'Santé - Beauté > Beauté > Parfumerie > Coffrets de parfum',
        'Gift Set' => 'Santé - Beauté > Beauté > Parfumerie > Coffrets de parfum'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd
        WHERE pd.products_id = p.products_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/leguide_fr.csv';
    $datas = utf8_encode($datas);
    if (file_put_contents($file, $datas)) echo 'CSV leguide.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV leguide.com</div><br />';


    //***************************************
    //CSV SHOPMANIA.COM
    //***************************************
    $fields = array (
        'categorie' => 'p.type as Type',
        'identifiant_unique' => 'products_model',
        'titre' => 'products_name',
        'description' => 'products_description',
        'prix' => 'products_price',
        'URL_produit' => "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', p.products_id)",
        'URL_image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'frais_de_port' => "'14'",
        'disponibilite' => 'products_status',
        'delai_de_livraison' => "'Livraison sous 8 à 12 jours ouvrables'",
        'garantie' => '"0"',
        'reference_modele' => 'products_model as model',
        'marque' => 'm.manufacturers_name'
    );

    $cat = array(
        'Shampoo' => 'Santé - Beauté > Beauté > Soins des cheveux > Shampoings',
        'Conditioner' => 'Santé - Beauté > Beauté > Soins des cheveux > Après-shampoings',
        'Fragrances' => 'Santé - Beauté > Beauté > Parfumerie > Parfums',
        'Bath & Body' => 'Santé - Beauté > Beauté > Soins du corps > Gels douche',
        'Gift Sets' => 'Santé - Beauté > Beauté > Parfumerie > Coffrets de parfum',
        'Gift Set' => 'Santé - Beauté > Beauté > Parfumerie > Coffrets de parfum'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['Type'] = $type[$data['Type']];
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/shopmania.csv';
    $datas = utf8_encode($datas);
    if (file_put_contents($file, $datas)) echo 'CSV shopmania.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV shopmania.com</div><br />';

    //***************************************
    //CSV kelkoo.ES
    //***************************************

    $fields = array (
        'id' => 'products_model as id',
        'model' => 'p.type as model',
        'brand' => 'm.manufacturers_name as brand',
        'description' => 'products_description',
        'price' => 'products_price',
        'url' => "CONCAT('http://www.perfumefrancia.com/product_info.php?products_id=', p.products_id)",
        'merchantcat' => 'p.type as cat',
        'image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'ean' => 'products_model as ean',
        'sku' => 'products_model as sku',
        'used' => '"neuf" as used',
        'availability' => '"1" as availability',
        'deliveryprice' => '"14" as deliveryprice',
        'deliverytime' => '"8 a 12 días" as deliverytime',
        'deliveryinfo' => '"" as deliveryinfo',
        'warranty' => '"" as warranty',
        'ecotax' => '"" as ecotax',
        'catkkid' => '"" as catkkid',
        'matching-tagging' => '"" as matching',
        'voucher' => '"" as voucher',
        'voucherdesc' => '"" as voucherdesc',
        'voucherurl' => '"" as voucherurl',
        'vouchercode' => '"" as vouchercode',
        'voucherstart' => '"" as voucherstart',
        'voucherend' => '"" as voucherend',
        'pricenorebate' => '"" as pricenorebate',
        'percentagepromo' => '"" as percentagepromo',
        'promostart' => '"" as promostart',
        'promoend' => '"" as promoend',
        'offertype' => '"" as offertype',
        'flag' => '"" as flag',
        'shopinfo' => '"" as shopinfo',
        'validity' => '"" as validity',
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 6
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");
    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $tmp = explode('|', $data['cat']);

        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/kelkoo_es.csv';
    if (file_put_contents($file, $datas)) echo 'CSV kelkoo.es mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV kelkoo.es</div><br />';


    //***************************************
    //CSV GOOGLE.com
    //***************************************
    $fields = array (
        'product_type' => 'p.type as Type',
        'manufacturer' => 'm.manufacturers_name as manufacturer',
        'description' => 'products_description',
        'link' => "CONCAT('http://www.parfumreduc.com/product_info.php?products_id=', p.products_id)",
        'image_link' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'id' => 'products_model',
        'title' => 'products_name',
        'quantity' => 'products_quantity',
        'availability' => 'IF(products_status, "in stock", "out of stock")',
        'shipping' => "'FR::Standard:14' as frais",
        'mnp' => 'products_model as upc',
        'price' => 'products_price',
        'condition' => '"new" as etat',
        'brand' => 'p.brand',
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, products_to_categories ptc, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 5
        and p.products_status = 1
        and p.products_quantity > 0
        and ptc.products_id = p.products_id
        and ptc.categories_id != 35");

    $datas = join(chr(9), array_keys($fields));
    while ($data = tep_db_fetch_array($query))
        $datas .= "\r\n".join(chr(9), $data);
        
    $file = 'download/csv/google.txt';
    if (file_put_contents($file, $datas)) echo 'CSV google.com mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV google.com</div><br />';

    //***************************************
    //CSV BEEZUP IT
    //***************************************
    $fields = array (
        'MPN' => 'products_model',
        'Marque / Fabriquant' => 'm.manufacturers_name as manufacturer',
        'EAN / UPC' => 'products_model as model',
        'Référence Interne' => 'products_model as intern',
        'Nom du produit' => 'products_name',
        'Description du produit' => 'products_description',
        'Prix' => 'products_price',
        'Expedition standard' => "'14'",
        'Disponibilité' => 'products_status',
        'Description de la disponibilité + garantie' => "'Consegna entro 8-12 giorni lavorativi'",
        'URL produit' => "CONCAT('http://www.profumifrancia.com/product_info.php?products_id=', p.products_id)",
        'URL image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Type' => 'p.type as Type',
        'Sexe' => 'p.gender as Gender',
        'Catégorie' => 'p.type as cat'
    );

    $type = array(
        'Shampoo' => 'Shampoo',
        'Conditioner' => 'Condizionatore',
        'Fragrances' => 'Profumi',
        'Bath & Body' => 'Bagno e Corpo',
        'Gift Sets' => 'Scatole',
        'Gift Set' => 'Scatole'
    );

    $gender = array(
      'Femmes' => 'Donna',
      'Hommes' => 'Uomo',
      'Unisex' => 'Unisex'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 8
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*get_price2($data['products_price'], PRICE_DE)*100)/100;
        $data['Type'] = $type[$data['Type']];
        $data['cat'] = $type[$data['cat']];
        $data['Gender'] = $gender[$data['Gender']];
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/beezup_it.csv';
    if (file_put_contents($file, $datas)) echo 'CSV beezup_it mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV beezup_it</div><br />';

    //***************************************
    //CSV BEEZUP DE
    //***************************************
    $fields = array (
        'MPN' => 'products_model',
        'Marque / Fabriquant' => 'm.manufacturers_name as manufacturer',
        'EAN / UPC' => 'products_model as model',
        'Référence Interne' => 'products_model as intern',
        'Nom du produit' => 'products_name',
        'Description du produit' => 'products_description',
        'Prix' => 'products_price',
        'Expedition standard' => "'14'",
        'Disponibilité' => 'products_status',
        'Description de la disponibilité + garantie' => "'Lieferung innerhalb von 8-12 Werktagen'",
        'URL produit' => "CONCAT('http://www.parfumfrankreich.com/product_info.php?products_id=', p.products_id)",
        'URL image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Type' => 'p.type as Type',
        'Sexe' => 'p.gender as Gender',
        'Catégorie' => 'p.type as cat'
    );

    $type = array(
        'Shampoo' => 'Shampoo',
        'Conditioner' => 'After Shampoo',
        'Fragrances' => 'Düfte',
        'Bath & Body' => 'Bath & Body',
        'Gift Sets' => 'Pakete',
        'Gift Set' => 'Pakete'
    );

    $gender = array(
      'Femmes' => 'Frauen',
      'Hommes' => 'Männer',
      'Unisex' => 'Unisex'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 7
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['Type'] = $type[$data['Type']];
        $data['cat'] = $type[$data['cat']];
        $data['Gender'] = $gender[$data['Gender']];
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/beezup_de.csv';
    if (file_put_contents($file, $datas)) echo 'CSV beezup_de mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV beezup_de</div><br />';

    //***************************************
    //CSV BEEZUP ES
    //***************************************
    $fields = array (
        'MPN' => 'products_model',
        'Marque / Fabriquant' => 'm.manufacturers_name as manufacturer',
        'EAN / UPC' => 'products_model as model',
        'Référence Interne' => 'products_model as intern',
        'Nom du produit' => 'products_name',
        'Description du produit' => 'products_description',
        'Prix' => 'products_price',
        'Expedition standard' => "'14'",
        'Disponibilité' => 'products_status',
        'Description de la disponibilité + garantie' => "'Entrega dentro de 8-12 días de trabajo'",
        'URL produit' => "CONCAT('http://www.profumifrancia.com/product_info.php?products_id=', p.products_id)",
        'URL image' => "CONCAT('http://www.parfumwholesale.com/images/', products_image)",
        'Type' => 'p.type as Type',
        'Sexe' => 'p.gender as Gender',
        'Catégorie' => 'p.type as cat'
    );

    $type = array(
        'Shampoo' => 'Champús',
        'Conditioner' => 'Acondicionador',
        'Fragrances' => 'Fragancias',
        'Bath & Body' => 'Baño y Cuerpo',
        'Gift Sets' => 'Paquetes',
        'Gift Set' => 'Paquetes'
    );

    $gender = array(
      'Femmes' => 'Mujeres',
      'Hommes' => 'Hombres',
      'Unisex' => 'Unisexo'
    );

    $query = tep_db_query("
        SELECT ".join(',', $fields)."
        FROM `products` p, products_description pd, manufacturers m
        WHERE pd.products_id = p.products_id
        and m.manufacturers_id = p.manufacturers_id
        and pd.language_id = 6
        and p.products_status = 1
        and p.products_quantity > 0
		and p.type in ('Fragrances', 'Gift Sets', 'Gift Set')");

    $datas = join('|', array_keys($fields));
    while ($data = tep_db_fetch_array($query)) {
        $data['products_price'] = round($currencies->currencies[$currency]['value']*$data['products_price']*100)/100;
        $data['Type'] = $type[$data['Type']];
        $data['cat'] = $type[$data['cat']];
        $data['Gender'] = $gender[$data['Gender']];
        $datas .= "\r\n".join('|', $data);
    }
    $file = 'download/csv/beezup_es.csv';
    if (file_put_contents($file, $datas)) echo 'CSV beezup_es mis a jour <br />';
    else echo '<div style="color:red;">Probleme maj CSV beezup_es</div><br />';

//}

function get_price2($price, $price_lang) {
    return ((($price-19)/1.33)*$price_lang)+19;
}

function delete_ids($query, $j) {
    $i = 0;
    $delete_list = array();
    while ($list = tep_db_fetch_array($query))
    {
        $delete_list[] = $list['id'];

        if ($i++ == 100){
            delete($delete_list);
            echo "Centaine " . $j++ . "<br />";
            $i = 0;
            $delete_list = array();
        }

    }

    if ($i != 0 && !empty($delete_list))
        delete($delete_list);
}

function delete($ids){

    $tables = array(
        'products',
        'products_to_categories',
        'products_attributes',
        'products_description',
        'products_notifications'
    );

    foreach ($tables as $table)
        $query = tep_db_query("DELETE FROM " . $table . " where products_id IN  (" . join(',', $ids) . ")");
}
?>