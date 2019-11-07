<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Formation.php');
	require('../src/controller/customClass/DownloadFile.php');

	class BackofficeFormation {

		private $bddObj;
		private $formationObj;
		private $downloadObj;
		private $connexion;
		private $nameFormation;
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
			$this->formationObj = new Formation();
			$this->downloadObj = new DownloadFile();
			$this->connexion = $this->bddObj->Start();
			$this->target_folder = "../public/images/formation/";
			
			if(!empty($_POST['name_formation'])) {
				$this->nameFormation = $_POST['name_formation'];
			}

			if(!empty($_POST['description'])) {
				$this->description = $_POST['description'];
			}

			if(!empty($_FILES['logo_formation'])) {
				$this->file = $_FILES['logo_formation'];
			}

			if(!empty($_POST['save'])) {
				$this->saveButton = $_POST['save'];
			}

			if(!empty($_POST['modify_formation'])) {
				$this->modifyButton = $_POST['modify_formation'];
			}

			if(!empty($_POST['delete_formation'])) {
				$this->deleteButton = $_POST['delete_formation'];
			}

			if(!empty($_POST['id'])) {
				$this->id = $_POST['id'];
			}

		}

		function backofficeAddFormation() {
			// Add a formation
			if(!empty($this->saveButton) && !empty($this->nameFormation) && !empty($this->description) && !empty($this->file["name"])) {

	    		// Insert fields in database
	    		$this->formationObj->Add_formation($this->nameFormation, $this->description, $this->file["name"], $this->connexion);

	    		// Download the file
				$this->downloadObj->Download($this->target_folder, $this->file);
	    	}
		}	// End function backofficeAddFormation

		function backofficeModifyFormation() {
			// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->nameFormation) && !empty($this->description)) {

    			if(!empty($this->file["name"])) {
    				$this->formationObj->Modify_formation_image($this->nameFormation, $this->description, $this->file["name"], $this->id, $this->connexion);

    				// Download the file
					$this->downloadObj->Download($this->target_folder, $this->file);
					
    			}
    			else if(empty($this->file["name"])) {
    				$this->formationObj->Modify_formation($this->nameFormation, $this->description, $this->id, $this->connexion);
    			}
    		}
		}

		function backofficeDeleteFormation() {
			// Delete a formation
    		if(!empty($this->deleteButton) && !empty($this->id)) {
    			$this->formationObj->Delete_formation($this->id, $this->connexion);
    		}
		}

		function backofficeDisplayFormation() {
			// Get informations in database
    		$informations = $this->formationObj->Display_formation($this->connexion);

    		return $informations;
		}

	} // End class BackofficeFormation


	// Object BackofficeFormation
	$objectBackofficeFormation = new BackofficeFormation();

	// Add formation
	$objectBackofficeFormation->backofficeAddFormation();

	// Modify formation
	$objectBackofficeFormation->backofficeModifyFormation();

	// Delete formation
	$objectBackofficeFormation->backofficeDeleteFormation();

	// Display all formations
	$requete = $objectBackofficeFormation->backofficeDisplayFormation();


	// Load the view
	require('../src/view/back/backoffice_formation_view.php');
?>