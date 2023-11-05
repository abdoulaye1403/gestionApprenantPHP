<?php
session_start();

if ('submit') {
  if (!empty($_POST)) {
    if ((!empty($_POST['id']))) {
      if (isset($_POST['id'])) {
        include_once 'fonctions.php';
        $db = new Fonction();
        $delete = $db->deleteApprenant($_POST['id']);

        if(!$delete){
          $_SESSION['message'] = 'Données non supprimer reessayer SVP';
          header('location: ../edit.php');
        }else{
          $_SESSION['message'] = 'Données supprimer avec succès';
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