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
		<!-- <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"> -->
		<!-- Css custom -->
		<link rel="stylesheet" href="public/css/style.css">
	</head>

	<body>
		<!-- Menu -->
		<nav class="menu">
			<ul>
				<li class="logo">
					<a href="#accueil">
						Matthieu CLIO
					</a>
				</li>

				<li>
					<a href="#accueil">
						Accueil
					</a>
				</li>

				<li>
					<a href="#competences">
						Compétences
					</a>
				</li>

				<li>
					<a href="#formation">
						Formations
					</a>
				</li>

				<li>
					<a href="#contact">
						Contact
					</a>
				</li>
			</ul>
		</nav>

		<header class="slider" id="accueil">
			<!-- Image in background -->
			<img src="public/images/photo/dev_web.jpg" alt="ordinateur" class="slider_photo">
			
			<!-- CV picture -->
			<figure class="slider_picture">
				<img src="public/images/photo/cv_picture.png" alt="Photo de profil">
			</figure>

			<section class="slider_information">
				<h1>
					Développeur web full stack
				</h1>

				<div class="slider_text_one">
					<a href="#competences" >
						<input type="button" name="languages" value="Langages" class="button_blue button_accueil_right">
					</a>
				</div>
				

				<div class="slider_text_two">
					<a href="#formation">
						<input type="button" name="languages" value="Mon parcours" class="button_orange button_accueil_left">
					</a>
				</div>
				
			</section>
		</header>

		<section class="skill" id="competences">
			<h2>Compétences</h2>			
		<?php 
			while($dataSkills = $requeteSkills->fetch()) {
				?>
				<div class="specific_skill">
					<figure class="resize_image">
						<img src="public/images/logo/<?php echo $dataSkills['image'];?>" alt="language">
					</figure>

					<p>
						<?php echo $dataSkills['langage']; ?>
					</p>

					<meter max="100" value="<?php echo $dataSkills['niveau']; ?>">
						0%
					</meter>
				</div>
		<?php 
			}
			?>
		</section>

		<section class="history">
			<h2>Matthieu CLIO</h2>

			<p>
				Actuellement à la recherche d’un poste dans le développement web
				<br>
				(CDD, CDI) pour 
				poursuivre une vrai carrière dans ce millieu.
				<br>
				<br>
				Mes précédents travails, stages et alternance m’ont apporté une expérience 
				<br>
				professionnelle principalement dans le domaine du développement web,
				<br>
				de la programmation et du réseau informatique.
				<br>
				<br>
				Sportif dans l'âme, joue actuellement dans une équipe de foot en 7 vs 7
				<br>
				en paticipation avec la FLA et pratique régulièrement la musculation
				<br>
				pour rester en forme, avec comme objectif : se dépasser.
			</p>

			<!-- image -->
			<div class="history_background">
			</div>
		</section>

		<section class="formation" id="formation">
			<h2>Formation</h2>

			<?php
			while($dataFormations = $requeteFormations->fetch()) {
			?>
				<div>
					<figure>
						<img src="public/images/logo/<?php echo $dataFormations['image']; ?>" alt="logo" class="logo_languages">
					</figure>

					<p>
						<br>
						<span>
							<?php echo $dataFormations['titre']; ?>
						</span>
						<br>
						<?php echo $dataFormations['description']; ?>
					</p>
				</div>
			<?php
			}
			?>
		</section>

		<form method="post" action="" class="form_contact">
			<h2 class="form_contact_h2">Formulaire de contact</h2>

			<section>
				<input type="text" name="sujet" class="input_text" placeholder="Objet">
				<input type="text" name="email" class="input_text" placeholder="Email">
				<p>
					Message
				</p>
				<textarea placeholder="Contenu" class="input_text"></textarea>

				<input type="submit" name="send_form" value="Envoyer" class="button_blue contact_button">
			</section>

			<!-- image -->
			<div class="form_background">
			</div>
		</form>

		<footer class="main_footer" id="contact">
			<section class="contact_information">
				<h2 class="main_footer_title">
					Contact
				</h2>

				<div class="container_mail_phone">
					<img src="public/images/logo/email.png" alt="Email" class="icone_footer">
					<p>
						<span class="large_text">
							Email :
						</span>
							matthieu.clio@gmail.com
					</p>

					<img src="public/images/logo/phone.png" alt="Email" class="icone_footer">
					<p>
						<span class="large_text">
							Tél : 
						</span>
							0663908906
					</p>
				</div>
			</section>

			<figure>
				<a href="https://www.facebook.com/matthieu.clio">
					<img src="public/images/logo/facebook.png" alt="Facebook" class="rezize_logo_footer">
					<figcaption>
						Facebook
					</figcaption>
				</a>
			</figure>

			<figure>
				<a href="https://github.com/matthieuClio">
					<img src="public/images/logo/github.png" alt="GitHub" class="rezize_logo_footer">
					<figcaption>
						GitHub
					</figcaption>
				</a>
			</figure>

			<figure>
				<a href="https://twitter.com/makabay1">
					<img src="public/images/logo/twitter.png" alt="Twitter" class="rezize_logo_footer">
					<figcaption>
						Twitter
					</figcaption>
				</a>
			</figure>

		</footer>
	</body>

</html>