<?php
class TacheManager
{
  private $db; // Instance de PDO.
 
  public function __construct($db)
  {
    $this->setDb($db);
  }
  //Ajour d'une tache à la base de donnee
  public function add(Tache $tache)
  {
    $q = $this->db->prepare('INSERT INTO taches (`Nom`, `Difficulte`, `Description`, `Id_Cat`) VALUES (:nom, :difficulte, 
    :description, :id_Cat)');
 
    $q->execute(array(
      ":nom" => $tache->nom(),
      ":difficulte" => $tache->difficulte(),
      ":description" => $tache->description(),
      ":id_Cat" => $tache->id_Cat()
    ));
  }
 
  public function delete(Tache $tache)
  {
    // Exécute une requête de type DELETE.
  }
 
  public function get($id)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Tache.
    $id = (int) $id;
 
    $q = $this->db->query('SELECT * FROM taches WHERE Id_Tm = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
 
    return new Tache ($donnees);
  }
 
  public function getList()
  {
    // Retourne la liste de tous les personnages.
  }
 
  public function update(Tache $tache)
  {
    //preparation de la requete avec PDO
    $q = $this->db->prepare('UPDATE taches SET (`Nom`, `Difficulte`, `Description`, `Id_Cat`) VALUES (:nom, :difficulte, 
    :description, :id_Cat) WHERE `Id_Tm` = :id');
    //Asignation des valeurs
    $q->execute(array(
      ":nom" => $tache->nom(),
      ":difficulte" => $tache->difficulte(),
      ":description" => $tache->description(),
      ":id_Cat" => $tache->id_Cat(),
      ":id" =>$tache->id()
    ));
  }
 
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }
}
?>