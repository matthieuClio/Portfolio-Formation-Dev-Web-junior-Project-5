<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Skill.php');
	require('../src/model/Formation.php');
	require('../src/model/Project.php');
	require('../src/model/Experience.php');

	class BackofficeAccueil {
		// Property
		private $bddObj;
		private $skillObj;
		private $formationObj;
		private $projectObj;
		private $experienceObj;
		private $connexion;
		private $mailSubject;
		private $mailAdress;
		private $mailText;
		private $buttonSendEmail;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->skillObj = new Skill();
		 	$this->formationObj = new Formation();
		 	$this->projectObj = new Project();
		 	$this->experienceObj = new Experience();
		 	// Bdd
		 	$this->connexion = $this->bddObj->Start();

		 	// Form data
		 	if(!empty($_POST['subject'])) {
		 		$this->mailSubject = $_POST['subject'];
		 	}

		 	if(!empty($_POST['email'])) {
		 		$this->mailAdress = $_POST['email'];
		 	}

		 	if(!empty($_POST['mail_text'])) {
		 		$this->mailAdress = $_POST['mail_text'];
		 	}

		 	if(!empty($_POST['send_form'])) {
		 		$this->buttonSendEmail = $_POST['send_form'];
		 	}
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

	    function homeProject() {
	    	// Get the informations in database
	    	$informations = $this->projectObj->Display_project($this->connexion);

	    	return $informations;
	    }

	    function homeExperience() {
	    	// Get the informations in database
	    	$informations = $this->experienceObj->Display_experience($this->connexion);

	    	return $informations;
	    }

	    function homeEmail() {
	    	if(!empty($this->buttonSendEmail)) {

	    		// Send a email
	    		$to = 'matthieu.clio@gmail.com';
		    	$subject = $this->mailSubject;
		    	$textEmail = $this->mailText;
		    	$from = $this->mailAdress;

	    		mail($to, $subject, $textEmail, $from);

	    		$_SESSION['notification'] = "Email envoyé";
	    	}
		}

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeAccueil = new BackofficeAccueil();

	// Informations of skills
	$requeteSkills = $objectBackofficeAccueil->homeSkill();

	// Informations of formation
	$requeteFormations = $objectBackofficeAccueil->homeFormation();

	// Informations of project
	$requeteProjects = $objectBackofficeAccueil->homeProject();

	// Informations of experience
	$requeteExperiences = $objectBackofficeAccueil->homeExperience();

	// Send email
	$objectBackofficeAccueil->homeEmail();


	// Load the view
	require('../src/view/front/accueil_view.php');
?>