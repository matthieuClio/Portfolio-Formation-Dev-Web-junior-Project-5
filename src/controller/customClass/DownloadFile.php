<?php
	class DownloadFile
	{
		private $limiteFile;
		private $uploadOk;
		private $popup;

		// Constructor
		function __construct() {
			$this->limiteFile = 800000;
			$this->uploadOk = 1;
			$this->popup = array();
		}

		public function Download($target_folder, $file)
		{
			// Download the file
    		// ...
    		// ...

    		// Define settings
			$target_file = $target_folder . basename($file["name"]);
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			
			// Check if image file is a actual image or fake image
		    $check = getimagesize($file["tmp_name"]);

		    if($check !== false) {

		        $this->popup[0] = "File is an image - " . $check["mime"] . ". ";
		        $this->uploadOk = 1;
		    }
		    else {
		        
		        $this->popup[1] = "File is not an image. ";
		        $this->uploadOk = 0;
		    }

		    // Check if file already exists
			if (file_exists($target_file)) {
				$this->popup[2] = "Sorry, file already exists. ";
			    $this->uploadOk = 0;
			}

			// Check file size
			if ($file["size"] > $this->limiteFile) {

				$this->popup[3] = "Sorry, your file is too large.";
			    $this->uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			 
				$this->popup[4] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$this->uploadOk = 0;
			}

			// Check if $uploadOk is set to false by an error
			if ($this->uploadOk == 0) {

				$this->popup[5] = "Sorry, your file was not uploaded.";
			}
			else {

			    if (move_uploaded_file($file["tmp_name"], $target_file)) {

			    	$this->popup[6] = "Download success";
			    } else {

			    	$this->popup[7] = "Download failed";
			    }
			}

			// Return Message if needed
			//...
			//return $this->popup;

		}	// End function Download


	} // End class DownloadFile
?>