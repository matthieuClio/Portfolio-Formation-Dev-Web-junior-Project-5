<?php

	class Email {

		// Property
		private $mailSubject;
		private $mailAdress;
		private $mailText;
		private $buttonSendEmail;

		// Constructor
		function __construct() {

		 	// Form data
		 	if(!empty($_POST['subject'])) {
		 		$this->mailSubject = $_POST['subject'];
		 	}

		 	if(!empty($_POST['email'])) {
		 		$this->mailAdress = $_POST['email'];
		 	}

		 	if(!empty($_POST['mail_text'])) {
		 		$this->mailText = $_POST['mail_text'];
		 	}

		 	if(!empty($_POST['send_form'])) {
		 		$this->buttonSendEmail = $_POST['send_form'];
		 	}
	    }

	    function sendEmail() {

	    	if(!empty($this->mailSubject) && !empty($this->mailAdress) && !empty($this->mailText)) {

	    		// Send a email
	    		$to = 'matthieu.clio@gmail.com';
		    	$subject = $this->mailSubject;
		    	$textEmail = $this->mailText;
		    	$from = $this->mailAdress;

	    		mail($to, $subject, $textEmail, $from);
	    	}
	    }

	} // End class Email


	// Object objectEmail
	$objectEmail = new Email();

	// Send email
	$objectEmail->sendEmail();
?>