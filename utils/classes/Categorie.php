<?php
	class Categorie{
		//On reprend les champs de la base de donnée
		private $id_cat;
		private $nom;
		
		//Fonctions Getter
		public function id_cat() { return $this->id_cat; }
		public function nom() { return $this->nom;}

		//La fonction hydratation consiste a donner à chaque variable la valeur correpondante dans la BDD
		public function hydratation(array $donnees){
			//On parcours le tableau $donnees pour attribuer chaque valeur a la variagble correspondante
			foreach($donnees as $key => $value){
				//ucfirst met le premier caractère de la chaine en majuscule
				$method ='set'.ucfirst($key);
				// Si le setter correspondant existe dans la classe. exemple si $key==id alors $method = 'setId'
			    if (method_exists($this, $method))
			    {
			    	// On appelle le setter. exemple this->setId($value)
			     	$this->$method($value);
			    }
			}
		}
		//Fonctions setter
		public function setId_cat($id_cat) { $this->id_cat = $id_cat; }
		public function setNom($nom) { $this->nom = $nom; }
	}
?>