<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php require('header/header_backoffice_view.php'); ?>
	</head>

	<body class="background_body">
		<header class="header_backoffice">
			<figure class="container_img_backoffice">
				<a href="backoffice" class="text_tab_backoffice">
					<img src="public/images/logo/info.png" alt="Logo pc">
				</a>
			</figure>
		</header>

		<?php require('menu/menu_backoffice_view.php'); ?>

		<main class="contain_backoffice">
			<section>
				<h1>Projet</h1>
			</section>

			<form method="post" action="backoffice/projet" class="form_project" enctype="multipart/form-data">
				<h2 class="modify_h2">
					Ajouter un projet
				</h2>

				<p class="project_p">
					Titre :
				</p>
				<input type="text" name="name_title" placeholder="Titre du projet" required>

				<p class="project_p">
					Lien :
				</p>
				<input type="text" name="name_link" placeholder="Lien du projet" required>
				
				<p class="project_p">
					Description :
				</p>
				<textarea name="description"></textarea>
				<input type="file" name="project_image" required>
				<input type="submit" name="save" value="Enregistrer" class="button_blue">
			</form>

			<h2 class="modify_h2">
				Modifier un projet
			</h2>

			<?php 
			while ($informations = $requete->fetch()) {
				?>
				<form method="post" action="backoffice/projet"  class="form_project" enctype="multipart/form-data">
					<img src="public/images/projet/<?php echo $informations['image'];?>" alt="formation" class="project_image">

					<input type="text" name="name_title" value="<?php echo $informations['titre'];?>" required>

					<input type="text" name="name_link" value="<?php echo $informations['lien'];?>" required>

					<textarea name="description">
						<?php echo $informations['description'];?>
					</textarea>
					
					<input type="file" name="project_image">

					<input type="submit" name="modify_formation" value="Modifier" class="button_blue">

					<input type="submit" name="delete_formation" value="Supprimer" class="button_red">
					<input type="hidden" name="id" value="<?php echo $informations['id'];?>">
				</form>
			<?php
			} ?>
			
		</main>
	</body>
</html>