<?php
	class Project
	{
		public function Add_project($titleProject, $lienProject, $description, $file, $connexion)
		{
			// Request
			$requete = $connexion->prepare('INSERT INTO projet(titre, lien, description, image) VALUES(?, ?, ?, ?)');
			$requete->execute(array($titleProject, $lienProject, $description, $file));
		}

		public function Display_project($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM projet');
			$requete->execute();

			return $requete;
		}

		public function Modify_project_image($titleProject, $lienProject, $description, $file, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE projet SET titre = ?, lien = ?, description = ?, image = ? WHERE id = ? ');
			$requete->execute(array($titleProject, $lienProject, $description, $file, $id));
		}

		public function Modify_project($titleProject, $lienProject, $description, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE projet SET titre = ?, lien = ?, description = ? WHERE id = ? ');
			$requete->execute(array($titleProject, $lienProject, $description, $id));
		}
	}
?>