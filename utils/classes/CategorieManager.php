<?php
class CategorieManager
{
  private $db; // Instance de PDO.
 
  public function __construct($db)
  {
    $this->setDb($db);
  }
  //Ajour d'une Categorie à la base de donnee
  public function add(Categorie $categorie)
  {
    $q = $this->db->prepare('INSERT INTO categories (`Nom`) VALUES (:nom)');
 
    $q->execute(array(
      ":nom" => $categorie->nom()
    ));
  }
 
  public function delete(Categorie $categorie)
  {
    // Exécute une requête de type DELETE.
  }
 
  public function get($id)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Categorie.
    $id = (int) $id;
 
    $q = $this->db->query('SELECT * FROM categories WHERE Id_Cat = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
 
    return new Categorie ($donnees);
  }
 
  public function getList()
  {
    // Retourne la liste de tous les personnages.
  }
 
  public function update(Categorie $categorie)
  {
    //preparation de la requete avec PDO
    $q = $this->db->prepare('UPDATE categories SET (`Nom`) VALUES (:nom) WHERE `Id_Cat` = :id');
    //Asignation des valeurs
    $q->execute(array(
      ":nom" => $categorie->nom()
    ));
  }
 
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }
}
?>