<?php

namespace app\controllers;

use app\models\Offer;
use app\models\Demand;

class AnnonceController
{
    private $offer;
    private $demand;

    public function __construct()
    {
        //  $this->offer = new Offer();
         $this->demand = new Demand();
    }

    public function showAnnonce()
    {
        include __DIR__ . "/../views/Annonce.php";
    }
  










  



    public function insertted()
    {
        if (isset($_POST['add'])) {

            echo 'test';
            if (!empty($_FILES["image_file"]["tmp_name"])) { // Vérifie si un fichier a été téléchargé
                $file_basename = pathinfo($_FILES["image_file"]["name"], PATHINFO_FILENAME);
                $file_extension = pathinfo($_FILES["image_file"]["name"], PATHINFO_EXTENSION);
                $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;

                $upload_directory = "assets/";
                $target_file = $upload_directory . $new_image_name;

                if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
                    if ($this->offer->insert($target_file)) {
                        header("location:/annonce?message=success");
                    } else {
                        header("location:/annonce?message=db_error");
                    }
                } else {
                    header("location:/annonce?message=upload_error");
                }
            } else {
                header("location:/annonce?message=no_file");
            }
        }
    }







public function ajoute_annonce() {
    
    if (isset($_POST['ajouter'])) {
      
        $titre = isset($_POST['titre']) ? $_POST['titre'] : "";
        $type = isset($_POST['type']) ? $_POST['type'] : "";
        $description = isset($_POST['description']) ? $_POST['description'] : "";
        $localisation = isset($_POST['city']) ? $_POST['city'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : "";
        $budget = isset($_POST['budget']) ? $_POST['budget'] : 0;
        $available_at = isset($_POST['disponsibilite']) ? $_POST['disponsibilite'] : null;
        $move_in_date = isset($_POST['move_in_date']) ? $_POST['move_in_date'] : null;

       
       

   
        $capacite_accueil = isset($_POST['capacite_accueil']) ? $_POST['capacite_accueil'] : 0;
        $equipement = isset($_POST['equipement']) ?$_POST['equipement'] : "";
        $criteres_colocataires = isset($_POST['criteres_colocataires']) ? $_POST['criteres_colocataires'] : "";
        $regle_cohabitation = isset($_POST['regle_cohabitation']) ? $_POST['regle_cohabitation'] : "";

      
        $demand_type = isset($_POST['demand_type']) ? $_POST['demand_type'] : "";
        $zones_souhaitees = isset($_POST['zones_souhaitees']) ? $_POST['zones_souhaitees'] : "";
    //    print_r( $galarie=$_FILES['images']);
    

        
        if (!empty($type)) {
            if ($type === "Offre") {
                echo "Ceci est une offre.";
            } else {
                echo "Ceci est une demande.";
                echo " annonce".$type;
                echo"demand type".$demand_type;
              $result= $this->demand-> setAttribut($type,$localisation,$address,
              $description,$budget,$available_at,
              $zones_souhaitees,$demand_type,$move_in_date);
              $annonce=$this->demand->create_annonce();
            }
        } else {
            echo "Le type d'annonce est invalide.";
        }
       

    }
    else{echo"nothing";}
}

}
