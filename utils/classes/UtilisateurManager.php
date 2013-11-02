<?php
class UtilisateurManager
{
  private $db; // Instance de PDO.
 
  public function __construct($db)
  {
    $this->setDb($db);
  }
  //Ajour d'un utilisateur à la base de donnee
  public function add(Utilisateur $utilisateur)
  {
    $q = $this->db->prepare('INSERT INTO utilisateurs (`Nom`, `Prenom`, `Age`, `Sexe`, `Email`, `Pwd`, `Telephone`, `Handicap`, `Avatar`)
    VALUES (:nom, :prenom, :age, :sexe, :email, :pwd, :telephone, :handicap, :avatar)');
 
    $q->execute(array(
      ":nom" => $utilisateur->nom(),
      ":prenom" => $utilisateur->prenom(),
      ":age" => $utilisateur->age(),
      ":sexe" => $utilisateur->sexe(),
      ":email" => $utilisateur->email(),
      ":pwd" => $utilisateur->pwd(),
      ":telephone" => $utilisateur->telephone(),
      ":handicap" => $utilisateur->handicap(),
      ":avatar" => $utilisateur->avatar()
    ));
  }
 
  public function delete(Utilisateur $utilisateur)
  {
    // Exécute une requête de type DELETE.
  }
 
  public function get($id)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Utilisateur.
    $id = (int) $id;
 
    $q = $this->db->query('SELECT * FROM utilisateurs WHERE Id_U = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
 
    return new Utilisateur ($donnees);
  }
 
  public function getList()
  {
    // Retourne la liste de tous les personnages.
  }
 
  public function update(Utilisateur $utilisateur)
  {
    //preparation de la requete avec PDO
    $q = $this->db->prepare('UPDATE utilisateurs SET `Nom`=:nom, `Prenom`=:prenom, `Age`=:age, `Sexe`=:sexe, `Email`=:email,
    `Pwd`=:pwd, `Telephone`=:telephone, `Handicap`=:handicap WHERE `id_U` = :id');
    //Asignation des valeurs
    $q->execute(array(
      ":nom" => $utilisateur->nom(),
      ":prenom" => $utilisateur->prenom(),
      ":age" => $utilisateur->age(),
      ":sexe" => $utilisateur->sexe(),
      ":email" => $utilisateur->email(),
      ":pwd" => $utilisateur->pwd(),
      ":telephone" => $utilisateur->telephone(),
      ":handicap" => $utilisateur->handicap(),
      ":id" =>$utilisateur->id()
    ));
  }
 
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }
}
?>