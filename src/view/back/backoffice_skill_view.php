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
				<h1>Compétence</h1>

				<form method="post" action="backoffice/competence"  class="form_formation">
					<h2 class="modify_h2">
						Ajouter une compétence
					</h2>

					<input type="text" name="language" placeholder="Langage" required>
					<input type="number" name="level" placeholder="Niveau" required>
					<input type="file" name="logo_language" required>
					<input type="submit" name="save" value="Enregistrer" class="button_blue">
				</form>


				<h2 class="modify_h2">
					Modifier une compétence
				</h2>

				<?php
					while ($informations = $requete->fetch()) {
					?>
						<form method="post" action="backoffice/competence"  class="form_formation">
							<img src="public/images/logo/<?php echo $informations['image'];?>" alt="language" class="resize_image">

							<input type="text" name="language" value="<?php echo $informations['langage'];?>" required>

							<input type="number" name="level" value="<?php echo $informations['niveau'];?>" required>

							<input type="file" name="logo_language">

							<input type="submit" name="modify_skill" value="Modifier" class="button_blue modify_skill">

							<input type="submit" name="delete_skill" value="Supprimer" class="button_red modify_skill">

							<input type="hidden" name="id" value="<?php echo $informations['id'];?>">

						</form>
					<?php
					} ?>
			</section>
		</main>
	</body>
</html>