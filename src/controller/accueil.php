<?php
	require('../core/Bdd_connexion.php');
	//require('../src/model/Accueil.php');

	class BackofficeAccueil {
		// Property
		private $bddObj;
		private $connexion;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->connexion = $this->bddObj->Start();
	    }

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeAccueil = new BackofficeAccueil();

	// Load the view
	require('../src/view/front/accueil_view.php');
?>