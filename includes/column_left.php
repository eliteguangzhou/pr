<?php
/*
  $Id: column_left.php,v 1.15 2003/07/01 14:34:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<table border="0"cellspacing="0" cellpadding="0">
	<tr>
    <td>
  		<table border="0" cellspacing="0" cellpadding="0" class="box_width_left">
      <?php
        require(DIR_WS_BOXES . 'best_manufacturers.php');
        require(DIR_WS_BOXES . 'best_products.php');

        if ($check_server == 'fr')
          require(DIR_WS_BOXES . 'discount.php');
      ?>
        <tr><td height="10"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr>
      <?php
        require(DIR_WS_BOXES . 'information.php');
      ?>
     <?php   if ($check_server == 'fr') { ?>
				                  <tr><td align="center" class="aerer2"><?php echo tep_image(DIR_WS_LANGUAGES.$language.'/images/LogoColissimo.png', 'kelkoo'); ?></td></tr>
	<?php } ?>
                <tr><td align="center" class="aerer2"><?php echo tep_image(DIR_WS_LANGUAGES.$language.'/images/part_shopping.gif', 'shopping'); ?></td></tr>
                  <tr><td align="center" class="aerer2"><?php echo tep_image(DIR_WS_LANGUAGES.$language.'/images/part_ciao.gif', 'ciao'); ?></td></tr>
                  <tr><td align="center" class="aerer2"><?php echo tep_image(DIR_WS_LANGUAGES.$language.'/images/part_kelkoo.gif', 'kelkoo'); ?></td></tr>
               
      <tr><td height="10"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr>
    	<?php if (0&& $check_server == 'fr') { ?>
      	<td><?php echo '<a href="'.tep_href_link(FILENAME_GIFT).'">'.tep_image(DIR_WS_IMAGES.'bann3.jpg').'</a>'; ?></td></tr>
      	<td><?php echo tep_draw_separator('spacer.gif', '9', '1'); ?></td></tr>
    	<?php } ?>
  	 </table>
	 </td>
	 <td><?php echo tep_draw_separator('spacer.gif', '9', '1'); ?></td>
	</tr>
</table>
