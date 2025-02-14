<?php
namespace app\controllers;

use app\models\User;

class DemandeController
{
  public function ShowDemande()
  {
    include __DIR__ . "/../views/demande.view.php";
  }
}



?>