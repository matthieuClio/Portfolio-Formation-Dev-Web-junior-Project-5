<!DOCTYPE html>
<html lang="fr">
	<head>
		<base href="/projet_5/">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Portfolio Matthieu</title>
		<meta name="description" content="Le livre Billet simple pour l'Alaska est disponible en lecture gratuite sur ce site.">
		<link rel="icon" type="image/jpg" href="public/images/icone/keyboard.png">

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
		<!-- Normalize -->
		<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
		<!-- Css custom -->
		<link rel="stylesheet" href="public/css/style.css">
	</head>

	<body class="background_body">
		<main>
			<section class="connexion_section">
				<figure class="image_connexion_bo">
					<img src="public/images/logo/screen.png" alt="livre ouvert">
				</figure>
				
				<form method="post" action="backoffice" class="connexion_form">
					<p class="connexion_p">
						Identifiant :
					</p>
					<input type="text" name="pseudo" class="input_connexion_bo" required>

					<p class="connexion_p">
						Mot de passe :
					</p>
					<input type="password" name="password" class="input_connexion_bo" required>

					<p class="connexion_p">Code :</p>
					<figure class="connexion_p">
						<img src="core/capthcaPicture.php" class="captcha_resizing">
					</figure>
							
					<p class="connexion_p">Entrer le code :</p>
					<input type="text" name="vercode" required class="input_connexion_bo" onpaste="return false;" oncopy="return false;" id="code_input" maxlength="6"/>

					<div class="container_checkbox">
						<input type="submit" name="submit_connexion" value="Connexion" class=" button_blue">
					</div>
				</form>

				<div class="error_bo">
					<h3>
						<?php if(!empty($_SESSION['error'])){ echo $_SESSION['error'];} ?>
					</h3>
				</div>
			</section>
		</main>
	</body>

</html>