<?php
session_start();

if ('submit') {
  if (!empty($_POST)) {
    if ((!empty($_POST['id']))&&(!empty($_POST['nom'])) && (!empty($_POST['email'])) && (!empty($_POST['pays'])) && (!empty($_POST['genre']))) {
      if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['pays']) && isset($_POST['genre'])) {
        include_once 'fonctions.php';
        $db = new Fonction();
        $update = $db->updateApprenant($_POST['id'],$_POST['nom'],$_POST['email'],$_POST['pays'],$_POST['genre']);

        if(!$update){
          $_SESSION['message'] = 'Données non modifier reessayer SVP';
          header('location: ../edit.php');
        }else{
          $_SESSION['message'] = 'Données modifier avec succès';
          header('location: ../index.php');
        }
        
      }
    }else{
      $_SESSION['message'] = 'Veuillez remplir tous les champs';
      header('location: ../index.php');
    }
  }
}
?>