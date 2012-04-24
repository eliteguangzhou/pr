<?php
if (!empty($current_category_id)) {
  $i = 0;
  $nbcol=3;
  $mamarqueold="!";

  $sql='SELECT DISTINCT
          m.manufacturers_name,
          c.parent_id,
          m.manufacturers_id
      FROM manufacturers m, products p, products_to_categories p2c, categories c
      WHERE p.manufacturers_id = m.manufacturers_id
      AND p2c.categories_id ='. $current_category_id .'
      AND p.products_id = p2c.products_id
      AND c.categories_id = p2c.categories_id
      GROUP BY p.manufacturers_id
      HAVING SUM(p.products_quantity) > 2
      ORDER BY m.manufacturers_name';

  $products_query = tep_db_query($sql);

  echo '<br />'.CHOOSE_YOUR_BRAND.'<br /><br /><table width="100%" border="0">';
  while($products = tep_db_fetch_array($products_query))
  {
    $mamarque = $products['manufacturers_name'];
    
    //si changement de lettre ou nouvelle lettre
    if (substr($mamarque,0,1) != substr($mamarqueold,0,1)) {
      if ($i == 0)
        echo '<tr>';
      else {
        if ($i % $nbcol + 1 == $nbcol)
          echo '</tr>';
          
        echo '</table>
          </td>
          </tr>
          <tr>
            <td>
              <table>
                <tr>
                  <td colspan="2" height="10">'.tep_draw_separator('spacer.gif', '1', '1').'</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>';
      }

      //affichage de la lettre
      echo '<td width="59"><img src="images/alpha/'. substr($mamarque,0,1) .'.gif" /></td><td><table>';
      $i = 0;
    }
    //fin de changement de lettre
    
    if ($i % $nbcol == 0)
      echo '<tr>';

  	echo '<td width="200"><a class="letter_center_roll" href="'.tep_href_link(FILENAME_DEFAULT, 'cPath='.$current_category_id.'&filter_id='.$products['manufacturers_id'].'&name='.rewrite_name($cat_name).'&name1='.rewrite_name($products['manufacturers_name'])).'">'.$products['manufacturers_name'].'</a></td>';

    if ($i % $nbcol == $nbcol - 1)
      echo '</tr>';
      
    $mamarqueold = $mamarque;
    $i++;
  }
  
  if ($i % $nbcol == $nbcol - 1)
    echo '</tr>';

  if ((isset($HTTP_GET_VARS['filter_id']))||(isset($HTTP_GET_VARS['manufacturers_id'])))
    echo '</table></td></tr>';

  echo '</table>';
}
?>