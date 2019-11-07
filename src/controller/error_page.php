<?php
	class ErrorPage {

		// Constructor
		function __construct() {
	    }

	    function erreurPageFonction() {
	    	// Load the view
			require('../src/view/front/erreur_view.php');
	    }

	} // End class ErrorPage

	// Object ErrorPage
	$objectErrorPage = new ErrorPage();
	$objectErrorPage->erreurPageFonction();
?>