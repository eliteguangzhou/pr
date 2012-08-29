<?php

class newsletter {

  function newsletter() {
  }

  function auto_save() {
    //Si le client a inscrit son email, on enregistre en base
    if (isset($_GET['newsletter']) && isset($_GET['type'])) {

      $newsletter = htmlentities($_GET['newsletter']);
      $type = htmlentities($_GET['type']);

      //On recupere l'email ou l'ip du client
      $email = /*isset($_GET['email']) ? str_replace('%40', '@', str_replace(' ', '', $_GET['email'])) :*/ session_id();

      //On verifie que l'email ou ip n'est pas deja present en base pour la newsletter en cours
      $rs = tep_db_query('SELECT neta_email FROM '.TABLE_NETA.' WHERE neta_email = "'.$email.'"');
      if (mysql_num_rows($rs) == 0)
        tep_db_query('INSERT INTO '.TABLE_NETA.' SET neta_email = "'.$email.'", neta_type = "'.$type.'", neta_newsletter = "'.$newsletter.'", neta_date_added = NOW()');

      $newsletter = (int) $_GET['newsletter'];
      $type = htmlentities($_GET['type']);
      setcookie('newsletter_parfumreduc', $newsletter.'||'.$type, time()+60*60*24*30);
    }
  }

  function save_newsletter_order($orders_id) {
    if (isset($_COOKIE['newsletter_parfumreduc']) && !empty($_COOKIE['newsletter_parfumreduc'])) {
      $temp = explode('||', $_COOKIE['newsletter_parfumreduc']);
      if (count($temp) == 2) {
        list($newsletter, $type) = $temp;
		//Check if not already registered
		$rs = tep_db_query('SELECT orders_id FROM '.TABLE_NEWSLETTERS_ORDERS.' WHERE orders_id = '.$orders_id.' AND newsletters_orders_type = "'.$type.'" AND newsletters_orders_newsletter = "'.$newsletter.'"');
		if (mysql_num_rows($rs) == 0)
			tep_db_query('INSERT INTO '.TABLE_NEWSLETTERS_ORDERS.' SET orders_id = '.$orders_id.', newsletters_orders_type = "'.$type.'", newsletters_orders_newsletter = "'.$newsletter.'", newsletters_orders_date_added = NOW()');
      }
    }
  }
}
?>