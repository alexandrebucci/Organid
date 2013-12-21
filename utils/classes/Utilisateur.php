<?php
	class Utilisateur{
		//On reprend les champs de la base de donnée
		private $id;
		private $nom;
		private $prenom;
		private $age;
		private $sexe;
		private $email;
		private $pwd;
		private $telephone;
		private $handicap;
		private $avatar;
		private $admin;
		

		//Fonctions Getter
		public function id() { return $this->id; }
		public function nom() { return $this->nom;}
		public function prenom() { return $this->prenom; }
		public function age() { return $this->age; }
		public function sexe() { return $this->sexe; }
		public function email() { return $this->email; }
		public function pwd() { return $this->pwd; }
		public function telephone() { return $this->telephone; }
		public function handicap() { return $this->handicap; }
		public function avatar() { return $this->avatar; }
		public function admin() { return $this->admin; }

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
		public function setPrenom($prenom) { $this->prenom = $prenom; }
		public function setAge($age) { $this->age = $age; }
		public function setSexe($sexe) { $this->sexe = $sexe; }
		public function setEmail($email) { $this->email = $email; }
		public function setPwd($pwd) { $this->pwd = $pwd; }
		public function setTelephone($telephone) { $this->telephone = $telephone; }
		public function setHandicap($handicap) { $this->handicap = $handicap; }
		public function setAvatar($avatar) { $this->avatar = $avatar; }
		public function setAdmin($admin) { $this->admin = $admin; }
	}
?>