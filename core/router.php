<?php
	
	$url = '';

	if (isset($_GET['url']) )
	{
		$url = explode('/', $_GET['url']);
	}

	if ($url == '') 
	{
		require('../src/controller/accueil.php');
	}

	/*else if ($url[0] == 'backoffice' && empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_connexion.php');
	}
	*/

	else 
	{
		//require('../src/controller/error_page.php');
	}
?>