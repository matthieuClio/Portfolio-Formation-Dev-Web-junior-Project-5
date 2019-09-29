<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Skill.php');

	class BackofficeAccueil {
		// Property
		private $bddObj;
		private $formationObj;
		private $connexion;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->skillObj = new Skill();
		 	$this->connexion = $this->bddObj->Start();
	    }

	    function homeSkill() {
	    	// Get the informations in database
	    	$informations = $this->skillObj->display_skill($this->connexion);

	    	return $informations;
	    }

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeAccueil = new BackofficeAccueil();

	// Informations of formation
	$requete = $objectBackofficeAccueil->homeSkill();

	// Load the view
	require('../src/view/front/accueil_view.php');
?>