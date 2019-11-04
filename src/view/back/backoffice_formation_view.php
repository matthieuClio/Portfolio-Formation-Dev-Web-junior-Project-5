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
				<h1>Formation</h1>
			</section>

			<form method="post" action="backoffice/formation" class="form_formation">
				<h2 class="modify_h2">
					Ajouter une formation
				</h2>

				<input type="text" name="name_formation" placeholder="Date - Intitulé - Ecole" required>
				<p class="formation_p">
					Description :
				</p>
				<textarea name="description"></textarea>
				<input type="file" name="logo_formation" required>
				<input type="submit" name="save" value="Enregistrer" class="button_blue">
			</form>

			<h2 class="modify_h2">
				Modifier une formation
			</h2>

			<?php
				while ($informations = $requete->fetch()) {
				?>
					<form method="post" action="backoffice/formation"  class="form_formation">
						<img src="public/images/logo/<?php echo $informations['image'];?>" alt="formation" class="resize_image">

						<input type="text" name="name_formation" value="<?php echo $informations['titre'];?>" required>

						<textarea name="description">
							<?php echo $informations['description'];?>
						</textarea>
						
						<input type="file" name="logo_formation">

						<input type="submit" name="modify_formation" value="Modifier" class="button_blue">

						<input type="submit" name="delete_formation" value="Supprimer" class="button_red">
						
						<input type="hidden" name="id" value="<?php echo $informations['id'];?>">
					</form>
			<?php
				} ?>
		</main>

	</body>
</html>