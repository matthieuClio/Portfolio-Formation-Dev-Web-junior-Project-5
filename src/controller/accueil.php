<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Skill.php');
	require('../src/model/Formation.php');

	class BackofficeAccueil {
		// Property
		private $bddObj;
		private $skillObj;
		private $formationObj;
		private $connexion;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->skillObj = new Skill();
		 	$this->formationObj = new Formation();

		 	$this->connexion = $this->bddObj->Start();
	    }

	    function homeSkill() {
	    	// Get the informations in database
	    	$informations = $this->skillObj->Display_skill($this->connexion);

	    	return $informations;
	    }

	    function homeFormation() {
	    	// Get the informations in database
	    	$informations = $this->formationObj->Display_formation($this->connexion);

	    	return $informations;
	    }

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeAccueil = new BackofficeAccueil();

	// Informations of skills
	$requeteSkills = $objectBackofficeAccueil->homeSkill();

	// Informations of formation
	$requeteFormations = $objectBackofficeAccueil->homeFormation();

	// Load the view
	require('../src/view/front/accueil_view.php');
?>