<?php
	class Skill
	{
		public function Add_skill($language, $level, $folder, $connexion)
		{
			// Request
			$requete = $connexion->prepare('INSERT INTO competence(langage, image, niveau) VALUES(?, ?, ?)');
			$requete->execute(array($language, $folder, $level));
		}

		public function Display_skill($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM competence');
			$requete->execute();

			return $requete;
		}

		public function Modify_skill_image($language, $level, $folder, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE competence SET langage = ?, image = ?, niveau = ? WHERE id = ? ');
			$requete->execute(array($language, $folder, $level, $id));
		}

		public function Modify_skill($language, $level, $id, $connexion)
		{
			$requete = $connexion->prepare('UPDATE competence SET langage = ?, niveau = ? WHERE id = ? ');
			$requete->execute(array($language, $level, $id));
		}

		public function Delete_skill($id, $connexion)
		{
			$requete = $connexion->prepare('DELETE FROM competence WHERE id = ? ');
			$requete->execute(array($id));
		}

	} // End class competence
?>