<!DOCTYPE html>
<html lang="fr">
	<head>
		<base href="/projet_5/">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Portfolio Matthieu</title>
		<meta name="description" content="Le livre Billet simple pour l'Alaska est disponible en lecture gratuite sur ce site.">
		<link rel="icon" type="image/jpg" href="public/images/icone/screen.png">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

		<!-- Font-awesome -->
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

		<!-- Normalize -->
		<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
		
		<!-- Css custom -->
		<link rel="stylesheet" href="public/css/style.css">
	</head>

	<body>
		<!-- MENU -->
		<header class="menu">

			<!-- Logo -->
			<div class="logo">
				<a href="#accueil">
					Matthieu Clio
				</a>
			</div>

			<!-- Tabs -->
			<nav>
				<ul>
					<li>
						<i class="fa fa-bars" id="button_menu">
						</i>
					</li>

					<li>
						<a href="#history" class="tab_menu">
							<i class="fa fa-address-book"></i>
							Matthieu
						</a>
					</li>

					<li>
						<a href="#competences" class="tab_menu">
							<i class="fa fa-language"></i>
							Compétences
						</a>
					</li>

					<li>
						<a href="#formation" class="tab_menu">
							<i class="fa fa-graduation-cap"></i>
							Formations
						</a>
					</li>

					<li>
						<a href="#projets" class="tab_menu">
							<i class="fa fa-archive"></i>
							Projets
						</a>
					</li>

					<li>
						<a href="#experience" class="tab_menu">
							<i class="fa fa-handshake-o"></i>
							Expériences
						</a>
					</li>

					<li>
						<a href="#contact" class="tab_menu">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
							Contact
						</a>
					</li>
				</ul>
			</nav>
		</header>


		<!-- Display a notification if the email form is sended -->
		<div class="notification" id="container_notification">
			Email envoyé
			<i class="fa fa-window-close notification_close" id="button_notification"></i>
		</div>

		<div class="slider" id="accueil">
			<!-- Image in background -->
			<img src="public/images/photo/contact.jpg" alt="lighting" class="slider_photo_2">
			<img src="public/images/photo/dev_web.jpg" alt="ordinateur" class="slider_photo">

			<!-- CV picture -->
			<figure class="slider_picture">
				<a href="#history">
					<img src="public/images/photo/cv_picture.png" alt="Photo de profil">
				</a>
			</figure>

			<section class="slider_information">
				<h1>
					Développeur web full stack
				</h1>

				<div class="slider_text_one">
					<a href="#competences" class="button_blue button_accueil_right">
						<i class="fa fa-language"></i> Langages
					</a>
				</div>

				<div class="slider_text_two">
					<a href="#projets" class="button_blue button_accueil_left">
						<i class="fa fa-graduation-cap"></i> Projets
					</a>
				</div>
			</section>
		</div>

		<section class="skill" id="competences">
			<h2>Compétences</h2>

			<!-- Spire design -->
			<div class="design_spire">
				<i class="fa fa-sort-desc"></i>
			</div>
			<div class="design_spire space_bottom">
				<i class="fa fa-sort-desc"></i>
			</div>
			<!-- End Spire design -->

		<?php 
			while($dataSkills = $requeteSkills->fetch()) {
				?>
				<div class="specific_skill">
					<figure class="resize_image middle_alignement">
						<img src="public/images/competence/<?php echo $dataSkills['image'];?>" alt="language" >
					</figure>

					<p class="middle_alignement">
						<?php echo $dataSkills['langage']; ?>
					</p>

					<progress max="100" value="<?php echo $dataSkills['niveau']; ?>" class="middle_alignement">
					</progress>

					<p class="middle_alignement color_blue">
						<?php echo $dataSkills['niveau']; ?>%
					</p>
				</div>
		<?php 
			}
			?>
		</section>

		<section class="history" id="history">
			<h2>Matthieu CLIO</h2>

			<p>
				Actuellement à la recherche d’un poste dans le développement web
				<br>
				(CDD, CDI) pour 
				poursuivre ma carrière de développeur web.
				<br>
				<br>
				Anciennement chez FDBI pendant 2 mois,
				<br>
				je me tiens à disposition pour mettre mon sérieux 
				<br>
				et ma détermination au service de l'entreprise.
				<br>
				<br>
				Mes précédents postes m’ont apporté une véritable expérience 
				<br>
				professionnelle dans le développement web
				<br>
				et du réseau informatique.
				<br>
				<br>
				Sportif dans l'âme, joue actuellement dans une équipe de foot en 7 vs 7
				<br>
				en paticipation avec la FLA et pratique régulièrement la musculation
				<br>
				pour rester en forme, avec comme objectif : se surpasser !
				<br>
				<br>
				<a href="public/cv/cv_developpeur_web_matthieu_clio.pdf" download="cv_developpeur_web_matthieu_clio" class="button_blue fa fa-user-circle">
					CV
   				</a>
			</p>

			<!-- image -->
			<div class="history_background">
			</div>
		</section>

		<section class="formation" id="formation">
			<h2>Formation</h2>

			<!-- Spire design -->
			<div class="design_spire">
				<i class="fa fa-sort-desc"></i>
			</div>
			<div class="design_spire space_bottom">
				<i class="fa fa-sort-desc"></i>
			</div>
			<!-- End Spire design -->

			<?php
			while($dataFormations = $requeteFormations->fetch()) {
			?>
				<div class="container_formation">
					<figure>
						<img src="public/images/formation/<?php echo $dataFormations['image']; ?>" alt="logo">
					</figure>

					<br>
					<div class="formation_title">
						<?php echo $dataFormations['titre']; ?>
					</div>

					<br>
					<div class="description_formation">
						<?php echo $dataFormations['description']; ?>
					</div>
					
				</div>
			<?php
			}
			?>
		</section>

		<section class="experience" id="experience">
			<h2>Expériences Réalisés</h2>

			<!-- Black filtered -->
			<div class="filtered_experience">
			</div>

			<!-- Spire design -->
			<div class="design_spire_color">
				<i class="fa fa-sort-desc"></i>
			</div>
			<div class="design_spire_color space_bottom">
				<i class="fa fa-sort-desc"></i>
			</div>
			<!-- End Spire design -->

			<?php
			while($dataExperience = $requeteExperiences->fetch()) {
			?>
				<div class="container_experience">
					<div class="experience_title">
						<?php echo $dataExperience['titre']; ?>
					</div>

					<figure class="container_image">
						<img src="public/images/experience/<?php echo $dataExperience['image']; ?>" alt="logo">
					</figure>

					<div class="description_experience">
						<?php echo $dataExperience['description']; ?>
					</div>
					
				</div>
			<?php
			}
			?>
		</section>

		<article class="article_news">
			<h2>Projets Réalisés</h2>

			<!-- Spire design -->
			<div class="design_spire">
				<i class="fa fa-sort-desc"></i>
			</div>
			<div class="design_spire space_bottom">
				<i class="fa fa-sort-desc"></i>
			</div>
			<!-- End Spire design -->

			<div id="projets">
				<!-- Projects -->
				<?php 
					while ($projects = $requeteProjects->fetch()) {
					?>
						<div class="container_article">
							<h3>
								<a href="<?php echo $projects['lien']; ?>">
									<?php echo $projects['titre']; ?>
								</a>
							</h3>
							<figure>
								<img src="public/images/projet/<?php echo $projects['image']; ?>" alt="image_projet" class="article_image article_image_one">

								<figcaption>
									<?php echo $projects['description']; ?>
								</figcaption>
							</figure>
						</div>
					<?php
					} ?>
			</div>
		</article>

		<footer class="main_footer" id="contact">
			<!-- Background image -->
			<div class="form_background">
			</div>

			<div class="form_background_two">
			</div>
	
			<form method="post" action="accueil" class="form_contact" id="my_form">
				<section>
					<h2 class="form_contact_h2">Formulaire de contact</h2>

					<input type="text" name="subject" class="input_text" placeholder="Objet" required>
					<input type="text" name="email" class="input_text" placeholder="Email" required>
					<p>
						Message
					</p>
					<textarea placeholder="Contenu" name="mail_text" class="input_text" required></textarea>

					<input type="submit" name="send_form" value="Envoyer" class="button_blue contact_button">
				</section>
			</form>

			<section class="contact_information">
				<h2 class="main_footer_title">
					Contact
				</h2>

				<div class="container_mail_phone">
					<figure class="information_footer">
						<img src="public/images/logo/email.png" alt="Email" class="icone_footer">
						<p>
							<span class="large_text">
								Email :
							</span>
							<br>
							matthieu.clio@gmail.com
						</p>
					</figure>
					
					<figure class="information_footer">
						<img src="public/images/logo/phone.png" alt="Email" class="icone_footer">
						<p>
							<span class="large_text">
								Tél : 
							</span>
							<br>
							0663908906
						</p>
					</figure>

					<figure class="information_footer">
						<img src="public/images/logo/eiffel.png" alt="tour eiffel" class="location_picture icone_footer">
						<p>
							<span class="large_text">
								Localisation : 
							</span>
							<br>
							Paris 13
						</p>
					</figure>
				</div>
			</section>

			<div class="social_network">
				<figure>
					<a href="https://www.facebook.com/matthieu.clio">
						<figure>
							<img src="public/images/logo/facebook.png" alt="Facebook" class="rezize_logo_footer">
							<figcaption>
								Facebook
							</figcaption>
						</figure>
					</a>
				</figure>

				<figure>
					<a href="https://github.com/matthieuClio">
						<figure>
							<img src="public/images/logo/github.png" alt="GitHub" class="rezize_logo_footer">
							<figcaption>
								GitHub
							</figcaption>
						</figure>
					</a>
				</figure>

				<figure>
					<a href="https://twitter.com/makabay1">
						<figure>
							<img src="public/images/logo/twitter.png" alt="Twitter" class="rezize_logo_footer">
							<figcaption>
								Twitter
							</figcaption>
						</figure>
					</a>
				</figure>
			</div>
		</footer>
		
		<script src="public/js/class/Email.js"></script>
		<!-- <script src="public/js/class/Notification.js"></script> -->
		<script src="public/js/class/Menu.js"></script>
		<script src="public/js/main.js"></script>
	</body>
</html>