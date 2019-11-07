<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Experience.php');
	require('../src/controller/customClass/DownloadFile.php');

	class BackofficeExperience {
		private $bddObj;
		private $experienceObj;
		private $downloadObj;
		private $connexion;
		private $nameExperience;
		private $description;
		private $file;
		private $target_folder;
		private $saveButton;
		private $modifyButton;
		private $deleteButton;
		private $id;

		// Constructor
		function __construct() {
			$this->bddObj = new bdd_connexion();
			$this->experienceObj = new Experience();
			$this->downloadObj = new DownloadFile();
			$this->connexion = $this->bddObj->Start();
			$this->target_folder = "../public/images/experience/";
			
			if(!empty($_POST['name_experience'])) {
				$this->nameExperience = $_POST['name_experience'];
			}

			if(!empty($_POST['description'])) {
				$this->description = $_POST['description'];
			}

			if(!empty($_FILES['logo_experience'])) {
				$this->file = $_FILES['logo_experience'];
			}

			if(!empty($_POST['save'])) {
				$this->saveButton = $_POST['save'];
			}

			if(!empty($_POST['modify_experience'])) {
				$this->modifyButton = $_POST['modify_experience'];
			}

			if(!empty($_POST['delete_experience'])) {
				$this->deleteButton = $_POST['delete_experience'];
			}

			if(!empty($_POST['id'])) {
				$this->id = $_POST['id'];
			}

		}

		function backofficeAddExperience() {

			// Add a formation
			if(!empty($this->saveButton) && !empty($this->nameExperience) && !empty($this->description) && !empty($this->file["name"])) {

	    		// Insert fields in database
	    		$this->experienceObj->Add_experience($this->nameExperience, $this->description, $this->file["name"], $this->connexion);

	    		// Download the file
				$this->downloadObj->Download($this->target_folder, $this->file);
	    	}
		}	// End function backofficeAddFormation

		function backofficeModifyExperience() {
			
			// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->nameExperience) && !empty($this->description)) {

    			if(!empty($this->file["name"])) {
    				$this->experienceObj->Modify_experience_image($this->nameExperience, $this->description, $this->file["name"], $this->id, $this->connexion);

    				// Download the file
					$this->downloadObj->Download($this->target_folder, $this->file);
					
    			}
    			else if(empty($this->file["name"])) {
    				$this->experienceObj->Modify_experience($this->nameExperience, $this->description, $this->id, $this->connexion);
    			}
    		}
		}

		function backofficeDeleteExperience() {
			// Delete a formation
    		if(!empty($this->deleteButton) && !empty($this->id)) {
    			$this->experienceObj->Delete_formation($this->id, $this->connexion);
    		}
		}

		function backofficeDisplayExperience() {
			// Get informations in database
    		$informations = $this->experienceObj->Display_experience($this->connexion);

    		return $informations;
		}

	} // End class BackofficeFormation


	// Object BackofficeExperience
	$objectBackofficeFormation = new BackofficeExperience();

	// Add experience
	$objectBackofficeFormation->backofficeAddExperience();

	// Modify experience
	$objectBackofficeFormation->backofficeModifyExperience();

	// Delete experience
	$objectBackofficeFormation->backofficeDeleteExperience();

	// Display all experience
	$requete = $objectBackofficeFormation->backofficeDisplayExperience();

	// Load the view
	require('../src/view/back/backoffice_experience_view.php');
?>