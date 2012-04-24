<?php
/*
  $Id: languages.php,v 1.15 2003/06/09 22:10:48 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/


$cat=isset($current_category_id) ? $current_category_id : 0;
global $check_server;
if ($check_server != 'en') {
?>

	<table cellpadding="0" cellspacing="0" border="0"><tr><td>
    <?php
      //  if ($check_server == 'fr' && (empty($cat) || !empty($_GET['products_id']) || $_SERVER['SCRIPT_NAME'] == '/shopping_cart.php')) {
            /*echo tep_image(DIR_WS_IMAGES.'p.jpg', '', '', '', ' id="img_p"');
            echo tep_image(DIR_WS_IMAGES.'pp.jpg', '', '', '', ' id="img_pp" style="display:none"');
            echo tep_image(DIR_WS_IMAGES.'ppp.jpg', '', '', '', ' id="img_ppp" style="display:none"');
            echo tep_image(DIR_WS_IMAGES.'pppp.jpg', '', '', '', ' id="img_pppp" style="display:none"');
            echo '<script type="text/javascript">var c_img_p = true;</script>';*/
       /*     echo '<script src="'.DIR_WS_INCLUDES.'/AC_RunActiveContent.js" type="text/javascript"></script>
            <script type="text/javascript">
              AC_FL_RunContent( \'codebase\',\'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\',\'width\',\'600\',\'height\',\'352\',\'src\',\'pr\',\'quality\',\'high\',\'pluginspage\',\'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\',\'movie\',\'pr\', \'play\', \'true\', \'loop\', \'true\' ); //end AC code
            </script>
            <noscript>
              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="600" height="352">
                <param name="movie" value="pr.swf" />
                <param name="quality" value="high" />
                <param name="loop" value="true" />
                <param name="play" value="true" />
                <embed src="pr.swf" quality="high" play="true" loop="true" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="600" height="352"></embed>
              </object>
            </noscript>';
            //echo '<center><a href="'.tep_href_link(FILENAME_ADVANTAGES).'">'.tep_image(DIR_WS_IMAGES.'ysl.jpg').'</a></center>';
        }
        elseif ($check_server == 'fr' && $cat == 901) {
            echo tep_image(DIR_WS_IMAGES.'p901.jpg', '', '', '', ' id="img_p901"');
            echo tep_image(DIR_WS_IMAGES.'pp901.jpg', '', '', '', ' id="img_pp901" style="display:none"');
            echo '<script type="text/javascript">var c_img_p901 = true;</script>';
        }
        elseif ($check_server == 'fr')
            echo tep_image(DIR_WS_IMAGES.'p'.$cat.'.jpg');
        elseif (!empty($cat) && in_array($cat, array(28, '38_27', '38_28')))
            echo tep_image(DIR_WS_IMAGES.'p'.$cat.'.jpg');*/
    echo '<a id="picture_sw" href="'.tep_href_link(FILENAME_ADVANTAGES).'">'.tep_image(DIR_WS_IMAGES.'ysl.jpg').'</a>';
	echo '</td></tr><tr><td height="9">'.tep_draw_separator('spacer.gif', '1', '1').'</td></tr></table>';

    ?>
    <!-- </td></tr><tr><td height="9"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr></table>-->
<?php } ?>
			  

			


