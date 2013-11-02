<?php
	class Tache{
		//On reprend les champs de la base de donnée
		private $id;
		private $nom;
		private $difficulte;
		private $description;
		private $id_Cat;
		
		//Fonctions Getter
		public function id() { return $this->id; }
		public function nom() { return $this->nom;}
		public function difficulte() { return $this->difficulte; }
		public function description() { return $this->description; }
		public function id_Cat() { return $this->id_Cat; }

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
		public function setId($id) { $this->id = $id; }
		public function setNom($nom) { $this->nom = $nom; }
		public function setDifficulte($difficulte) { $this->difficulte = $difficulte; }
		public function setDescription($description) { $this->description = $description; }
		public function setId_Cat($id_Cat) { $this->id_Cat = $id_Cat; }
	}
?>