<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Project.php');

	class BackofficeProject {

		private $bddObj;
		private $projectObj;
		private $connexion;
		private $titleProject;
		private $lienProject;
		private $description;
		private $file;
		private $saveButton;
		private $id;

		// Constructor
		function __construct() {
			$this->bddObj = new bdd_connexion();
			$this->projectObj = new Project();
			$this->connexion = $this->bddObj->Start();


			if(!empty($_POST['name_title'])) {
				$this->titleProject = $_POST['name_title'];
			}

			if(!empty($_POST['name_link'])) {
				$this->lienProject = $_POST['name_link'];
			}

			if(!empty($_POST['description'])) {
				$this->description = $_POST['description'];
			}

			if(!empty($_POST['project_image'])) {
				$this->file = $_POST['project_image'];
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

		function backofficeAddProject() {
			if(!empty($this->saveButton) && !empty($this->titleProject) && !empty($this->lienProject) && !empty($this->description) && !empty($this->file)) {

	    		// Insert fields in database
	    		$this->projectObj->Add_project($this->titleProject, $this->lienProject, $this->description, $this->file, $this->connexion);
	    	}
		}

		function backofficeModifyProject() {
			// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->lienProject) && !empty($this->description)) {

    			if(!empty($this->file)) {
    				$this->projectObj->Modify_project_image($this->titleProject, $this->lienProject, $this->description, $this->file, $this->id, $this->connexion);
    			}
    			else if(empty($this->file)) {
    				$this->projectObj->Modify_project($this->titleProject, $this->lienProject, $this->description, $this->id, $this->connexion);
    			}
    		}
		}

		function backofficeDisplayProject() {
			// Get informations in database
    		$informations = $this->projectObj->Display_project($this->connexion);

    		return $informations;
		}

	} // End class BackofficeBillet


	// Object BackofficeProject
	$objectBackofficeProject = new BackofficeProject();

	// Add project
	$objectBackofficeProject->backofficeAddProject();

	// Modify formation
	$objectBackofficeProject->backofficeModifyProject();

	// Display all formations
	$requete = $objectBackofficeProject->backofficeDisplayProject();


	// Load the view
	require('../src/view/back/backoffice_project_view.php');
?>