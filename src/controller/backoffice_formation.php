<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Formation.php');

	class BackofficeFormation {

		private $bddObj;
		private $formationObj;
		private $connexion;
		private $nameFormation;
		private $description;
		private $file;
		private $saveButton;
		private $id;

		// Constructor
		function __construct() {
			$this->bddObj = new bdd_connexion();
			$this->formationObj = new Formation();
			$this->connexion = $this->bddObj->Start();


			if(!empty($_POST['name_formation'])) {
				$this->nameFormation = $_POST['name_formation'];
			}

			if(!empty($_POST['description'])) {
				$this->description = $_POST['description'];
			}

			if(!empty($_POST['logo_formation'])) {
				$this->file = $_POST['logo_formation'];
			}

			if(!empty($_POST['save'])) {
				$this->saveButton = $_POST['save'];
			}

			if(!empty($_POST['modify_formation'])) {
				$this->modifyButton = $_POST['modify_formation'];
			}

			if(!empty($_POST['id'])) {
				$this->id = $_POST['id'];
			}
		}

		function backofficeAddFormation() {
			if(!empty($this->saveButton) && !empty($this->nameFormation) && !empty($this->description) && !empty($this->file)) {

	    		// Insert fields in database
	    		$this->formationObj->Add_formation($this->nameFormation, $this->description, $this->file, $this->connexion);
	    	}
		}

		function backofficeModifyFormation() {
			// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->nameFormation) && !empty($this->description)) {

    			if(!empty($this->file)) {
    				$this->formationObj->Modify_formation_image($this->nameFormation, $this->description, $this->file, $this->id, $this->connexion);
    			}
    			else if(empty($this->file)) {
    				$this->formationObj->Modify_formation($this->nameFormation, $this->description, $this->id, $this->connexion);
    			}
    		}
		}

		function backofficeDisplayFormation() {
			// Get informations in database
    		$informations = $this->formationObj->Display_formation($this->connexion);

    		return $informations;
		}

	} // End class BackofficeBillet


	// Object BackofficeBillet
	$objectBackofficeFormation = new BackofficeFormation();

	// Add formation
	$objectBackofficeFormation->backofficeAddFormation();

	// Modify formation
	$objectBackofficeFormation->backofficeModifyFormation();

	// Display all formations
	$requete = $objectBackofficeFormation->backofficeDisplayFormation();


	// Load the view
	require('../src/view/back/backoffice_formation_view.php');
?>