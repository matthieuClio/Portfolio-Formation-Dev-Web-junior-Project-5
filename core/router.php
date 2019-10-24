<?php
	
	$url = '';

	if (isset($_GET['url']) )
	{
		$url = explode('/', $_GET['url']);
	}

	// Home page
	if ($url == '') 
	{
		require('../src/controller/accueil.php');
	}

	// Backoffice project page
	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'projet' && !empty($_SESSION['pseudo_user']))
	{
		require('../src/controller/backoffice_project.php');
	}

	// Backoffice skill page
	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'competence' && !empty($_SESSION['pseudo_user']))
	{
		require('../src/controller/backoffice_skill.php');
	}

	// Backoffice formation page
	else if ($url[0] == 'backoffice' && !empty($url[1]) && $url[1] == 'formation' && !empty($_SESSION['pseudo_user']))
	{
		require('../src/controller/backoffice_formation.php');
	}
	
	// Backoffice if user is connected or if he use the connexion form
	else if ($url[0] == 'backoffice' && !empty($_SESSION['pseudo_user']) || $url[0] == 'backoffice' && !empty($_POST['submit_connexion']))
	{
		require('../src/controller/backoffice.php');
	}

	// Backoffice connexion form
	else if ($url[0] == 'backoffice' && empty($_SESSION['pseudo_user'])) 
	{
		require('../src/controller/backoffice_connexion.php');
	}

	// 404 error page
	else 
	{
		//require('../src/controller/error_page.php');
	}
?>