<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Project.php');
	require('../src/controller/customClass/DownloadFile.php');

	class BackofficeProject {

		private $bddObj;
		private $projectObj;
		private $connexion;
		private $titleProject;
		private $lienProject;
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
			$this->projectObj = new Project();
			$this->downloadObj = new DownloadFile();
			$this->connexion = $this->bddObj->Start();
			$this->target_folder = "../public/images/projet/";

			if(!empty($_POST['name_title'])) {
				$this->titleProject = $_POST['name_title'];
			}

			if(!empty($_POST['name_link'])) {
				$this->lienProject = $_POST['name_link'];
			}

			if(!empty($_POST['description'])) {
				$this->description = $_POST['description'];
			}

			if(!empty($_FILES['project_image'])) {
				$this->file = $_FILES['project_image'];
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

		function backofficeAddProject() {
			if(!empty($this->saveButton) && !empty($this->titleProject) && !empty($this->lienProject) && !empty($this->description) && !empty($this->file["name"])) {

	    		// Insert fields in database
	    		$this->projectObj->Add_project($this->titleProject, $this->lienProject, $this->description, $this->file["name"], $this->connexion);

	    		// Download the file
				$this->downloadObj->Download($this->target_folder, $this->file);
	    	}
		}

		function backofficeModifyProject() {
			// Modify a formation
    		if(!empty($this->modifyButton) && !empty($this->lienProject) && !empty($this->description)) {

    			if(!empty($this->file["name"])) {
    				$this->projectObj->Modify_project_image($this->titleProject, $this->lienProject, $this->description, $this->file["name"], $this->id, $this->connexion);

    				// Download the file
					$this->downloadObj->Download($this->target_folder, $this->file);
					?> <script type="text/javascript"> alert('ok')</script> <?php
    			}
    			else if(empty($this->file["name"])) {
    				$this->projectObj->Modify_project($this->titleProject, $this->lienProject, $this->description, $this->id, $this->connexion);
    			}
    		}
		}

		function backofficeDeleteProject() {
			// Delete a formation
    		if(!empty($this->deleteButton) && !empty($this->id)) {
    			$this->projectObj->Delete_project( $this->id, $this->connexion);
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

	// Delete formation
	$objectBackofficeProject->backofficeDeleteProject();

	// Display all formations
	$requete = $objectBackofficeProject->backofficeDisplayProject();


	// Load the view
	require('../src/view/back/backoffice_project_view.php');
?>