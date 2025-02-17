<?php
namespace app\controllers;

use app\models\User;

class OfferController
{
  public function ShowOffer()
  {
    $id=$_GET['offer_id'];
    include __DIR__ . "/../views/offer.view.php";
   
  }
}



?>