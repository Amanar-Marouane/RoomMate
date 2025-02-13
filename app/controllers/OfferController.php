<?php
namespace app\controllers;

use app\models\User;

class OfferController
{
  public function ShowOffer()
  {
    include __DIR__ . "/../views/offer.view.php";
  }
}



?>