<head>
	<base href="/projet_5/">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portfolio Matthieu</title>
	<meta name="description" content="Protfolio développeur web de Matthieu CLIO">
	<link rel="icon" type="image/jpg" href="public/images/icone/keyboard.png">

	<!-- Font-awesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
	<!-- Normalize -->
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<!-- Css custom -->
	<link rel="stylesheet" href="public/css/style.css">

	<?php 
	$desable = false;
	if (!empty($_SESSION['pseudo_user']) && !$desable) {
		?>
			<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
			<script>tinymce.init({selector:'textarea'});</script>
		<?php
	}
?>
</head>