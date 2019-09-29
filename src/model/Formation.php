<?php
	class Formation
	{
		public function Add_formation($nameFormation, $description, $file, $connexion)
		{
			// Request
			$requete = $connexion->prepare('INSERT INTO formation(titre, description, image) VALUES(?, ?, ?)');
			$requete->execute(array($nameFormation, $description, $file));
		}

		public function Display_formation($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM formation');
			$requete->execute();

			return $requete;
		}

		public function Modify_formation_image($nameFormation, $description, $file, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE formation SET titre = ?, description = ?, image = ? WHERE id = ? ');
			$requete->execute(array($nameFormation, $description, $file, $id));
		}

		public function Modify_formation($nameFormation, $description, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE formation SET titre = ?, description = ? WHERE id = ? ');
			$requete->execute(array($nameFormation, $description, $id));
		}
	}
?>