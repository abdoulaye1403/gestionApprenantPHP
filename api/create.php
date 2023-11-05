<?php
session_start();

if ('submit') {
  if (!empty($_POST)) {
    if ((!empty($_POST['nom'])) && (!empty($_POST['email'])) && (!empty($_POST['pays'])) && (!empty($_POST['genre']))) {
      if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['pays']) && isset($_POST['genre'])) {
        include_once 'fonctions.php';
        $db = new Fonction();
        $save = $db->createApprenant($_POST['nom'],$_POST['email'],$_POST['pays'],$_POST['genre']);

        if(!$save){
          $_SESSION['message'] = 'Données non enregistrer reessayer SVP';
          header('location: ../index.php');
        }else{
          $_SESSION['message'] = 'Données enregistrer avec succès';
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