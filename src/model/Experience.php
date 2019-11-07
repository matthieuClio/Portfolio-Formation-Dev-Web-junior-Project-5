<?php
	class Experience
	{
		public function Add_experience($nameExperience, $description, $file, $connexion)
		{
			// Request
			$requete = $connexion->prepare('INSERT INTO experience(titre, description, image) VALUES(?, ?, ?)');
			$requete->execute(array($nameExperience, $description, $file));
		}

		public function Display_experience($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM experience');
			$requete->execute();

			return $requete;
		}

		public function Modify_experience_image($nameExperience, $description, $file, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE experience SET titre = ?, description = ?, image = ? WHERE id = ? ');
			$requete->execute(array($nameExperience, $description, $file, $id));
		}

		
		public function Modify_experience($nameExperience, $description, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE experience SET titre = ?, description = ? WHERE id = ? ');
			$requete->execute(array($nameExperience, $description, $id));
		}
		
		public function Delete_formation($id, $connexion)
		{
			$requete = $connexion->prepare('DELETE FROM experience WHERE id = ? ');
			$requete->execute(array($id));
		}
		
	}
?>
