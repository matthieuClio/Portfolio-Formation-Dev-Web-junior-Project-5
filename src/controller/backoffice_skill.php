<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Skill.php');

	class BackofficeSkill {

		private $bddObj;
		private $skillObj;
		private $connexion;
		private $language;
		private $level;
		private $file;
		private $id;
		private $saveButton;
		private $modifyButton;
		private $deleteButton;

		// Constructor
		function __construct() {
			$this->bddObj = new bdd_connexion();
			$this->skillObj = new Skill();
			$this->connexion = $this->bddObj->Start();


			if(!empty($_POST['language'])) {
				$this->language = $_POST['language'];
			}

			if(!empty($_POST['level'])) {
				$this->level = $_POST['level'];
			}

			if(!empty($_POST['logo_language'])) {
				$this->file = $_POST['logo_language'];
			}

			if(!empty($_POST['save'])) {
				$this->saveButton = $_POST['save'];
			}

			if(!empty($_POST['modify_skill'])) {
				$this->modifyButton = $_POST['modify_skill'];
			}

			if(!empty($_POST['delete_skill'])) {
				$this->deleteButton = $_POST['delete_skill'];
			}

			if(!empty($_POST['id'])) {
				$this->id = $_POST['id'];
			}
	    }

	    function backofficeAddSkill() {
	    	if(!empty($this->saveButton) && !empty($this->language) && !empty($this->level) && !empty($this->file)) {

	    		// Insert fields in database
	    		$this->skillObj->Add_skill($this->language, $this->level, $this->file, $this->connexion);
	    	}
	    }

	    function backofficeModifySkill() {
    		// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->language) && !empty($this->level)) {

    			if(!empty($this->file)) {
    				$this->skillObj->Modify_skill_image($this->language, $this->level, $this->file, $this->id, $this->connexion);
    			}
    			else if(empty($this->file)) {
    				$this->skillObj->Modify_skill($this->language, $this->level, $this->id, $this->connexion);
    			}
    		}
	    }

	    function backofficeDeleteSkill() {
    		// Delete a formation
    		if(!empty($this->deleteButton) && !empty($this->id)) {

	    		$this->skillObj->Delete_skill($this->id, $this->connexion);
    		}
	    }

	    function backofficeDisplaySkill() {
    		// Get informations in database
    		$informations = $this->skillObj->Display_skill($this->connexion);

    		return $informations;
	    }


	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeSkill = new BackofficeSkill();

	// Add a formation
	$objectBackofficeSkill->backofficeAddSkill();

	// Modify a formation
	$objectBackofficeSkill->backofficeModifySkill();

	// Delete a formation
	$objectBackofficeSkill->backofficeDeleteSkill();

	// Display all formations
	$requete = $objectBackofficeSkill->backofficeDisplaySkill();

	// Load the view
	require('../src/view/back/backoffice_skill_view.php');
?>