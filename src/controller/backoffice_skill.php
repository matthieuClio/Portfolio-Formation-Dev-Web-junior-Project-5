<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Skill.php');
	require('../src/controller/customClass/DownloadFile.php');

	class BackofficeSkill {

		private $bddObj;
		private $skillObj;
		private $connexion;
		private $language;
		private $level;
		private $file;
		private $target_folder;
		private $id;
		private $saveButton;
		private $modifyButton;
		private $deleteButton;

		// Constructor
		function __construct() {
			$this->bddObj = new bdd_connexion();
			$this->skillObj = new Skill();
			$this->downloadObj = new DownloadFile();
			$this->connexion = $this->bddObj->Start();
			$this->target_folder = "../public/images/competence/";

			if(!empty($_POST['language'])) {
				$this->language = $_POST['language'];
			}

			if(!empty($_POST['level'])) {
				$this->level = $_POST['level'];
			}

			if(!empty($_FILES['logo_language'])) {
				$this->file = $_FILES['logo_language'];
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
	    	if(!empty($this->saveButton) && !empty($this->language) && !empty($this->level) && !empty($this->file["name"])) {

	    		// Insert fields in database
	    		$this->skillObj->Add_skill($this->language, $this->level, $this->file["name"], $this->connexion);

	    		// Download the file
				$this->downloadObj->Download($this->target_folder, $this->file);
	    	}
	    }

	    function backofficeModifySkill() {
    		// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->language) && !empty($this->level)) {

    			if(!empty($this->file["name"])) {
    				$this->skillObj->Modify_skill_image($this->language, $this->level, $this->file["name"], $this->id, $this->connexion);

    				// Download the file
					$this->downloadObj->Download($this->target_folder, $this->file);
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