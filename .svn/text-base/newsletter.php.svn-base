<?php
	if (isset($_GET['n']) && isset($_GET['p']) && ($rs = @file_get_contents('newsletters/'.$_GET['n'].'.html')) !== false)
		echo str_replace('{type}', $_GET['p'], $rs);
	else
		echo 'Newsletter '.$_GET['n'].' inconnue ou partenaire manquant.';
?>