<?php
class Fonction{

// creation de la connection
  private $connection;
  function __construct()
  {
    include_once dirname(__FILE__) . '/connection.php';
    $link = new Connection();
    $this->connection = $link->connect();
  }
//  creation d'apprenant
  function createApprenant($nom,$email,$pays,$genre){
    $query = $this->connection->prepare('INSERT INTO etudiants(nom,email,pays,genre) VALUES(?,?,?,?)');
    $query->bind_param('ssss', $nom, $email, $pays, $genre);

    if($query->execute()){
      return true;
    }
    return false;
  }
// lister les apprenants
  function getApprenant(){
    $query = $this->connection->prepare('SELECT * FROM  etudiants');
   
    if($query->execute()){
      $result = $query->get_result();
      return $result;
    }
    
  }

// recuprerer un apprenant par son id
  function getApprenantById($id){
    $query = $this->connection->prepare('SELECT * FROM  etudiants WHERE id = ?');
    $query->bind_param('i', $id);
    if($query->execute()){
      $result = $query->get_result();
      return $result;
    } 
  }

// modifier les infos d'un apprenant
  function updateApprenant($id,$nom,$email,$pays,$genre){
    $query = $this->connection->prepare('UPDATE etudiants set nom=?,email=?,pays=?,genre=? WHERE id=?');
    $query->bind_param('ssssi', $nom, $email, $pays, $genre,$id);

    if($query->execute()){
      return true;
    }
    return false;
  }

// supprimer un apprenant
  function deleteApprenant($id){
    $query = $this->connection->prepare('DELETE FROM etudiants WHERE id=?');
    $query->bind_param('i',$id);

    if($query->execute()){
      return true;
    }
    return false;
  }
}