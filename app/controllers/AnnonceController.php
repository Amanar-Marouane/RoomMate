<?php

namespace app\controllers;

use app\models\{Offer, Demand};
use Exception;
use Dotenv\Dotenv;

class AnnonceController
{
    private $offer;
    private $demand;

    public function __construct()
    {
        $this->offer = new Offer();
        $this->demand = new Demand();
    }

    public function showAnnonce()
    {
        include __DIR__ . "/../views/Annonce.php";
    }
    public function show_all_Annonce()
    {
        include __DIR__ . "/../views/liste.php";
    }

    // public function insertted(array $photos)
    // {
    //     $upload_directory = "assets/";
    //     $uploaded_photos = []; 

    //     foreach ($photos["tmp_name"] as $index => $tmpName) {
    //         if (!empty($tmpName)) {
    //             $file_basename = pathinfo($photos["name"][$index], PATHINFO_FILENAME);
    //             $file_extension = pathinfo($photos["name"][$index], PATHINFO_EXTENSION);
    //             $new_image_name = $file_basename . '_' . date("Ymd_His") . '.' . $file_extension;
    //             $target_file = $upload_directory . $new_image_name;

    //             if (move_uploaded_file($tmpName, $target_file)) {
    //                 $uploaded_photos[] = [

    //                     "stored_name"   => $new_image_name,
    //                     "path"          => $target_file,

    //                 ];
    //             } else {
    //                 return ["error" => "Erreur lors de l'upload de l'image: " . $photos["name"][$index]];
    //             }
    //         }
    //     }

    //     return $uploaded_photos;
    // }


    public function insertted(array $photos)
    {
        $upload_directory = "assets/";
        $uploaded_photos = [];

        // Si il n'y a qu'un seul fichier, on convertit la structure pour qu'elle soit un tableau
        if (!isset($photos["tmp_name"][0])) {
            $photos = [
                "tmp_name" => [$photos["tmp_name"]],
                "name" => [$photos["name"]],
                "type" => [$photos["type"]],
                "error" => [$photos["error"]],
                "size" => [$photos["size"]]
            ];
        }

        // Traiter les fichiers
        foreach ($photos["tmp_name"] as $index => $tmpName) {
            if (!empty($tmpName)) {
                $file_basename = pathinfo($photos["name"][$index], PATHINFO_FILENAME);
                $file_extension = pathinfo($photos["name"][$index], PATHINFO_EXTENSION);
                $new_image_name = $file_basename . '' . date("Ymd_His") . '.' . $file_extension;
                $target_file = $upload_directory . $new_image_name;

                if (move_uploaded_file($tmpName, $target_file)) {
                    $uploaded_photos[] = [
                        "stored_name" => $new_image_name,
                        "path" => $target_file,
                    ];
                } else {
                    return ["error" => "Erreur lors de l'upload de l'image: " . $photos["name"][$index]];
                }
            }
        }

        return $uploaded_photos;
    }






    public function ajoute_annonce()
    {

        if (isset($_POST['ajouter'])) {
            $title = isset($_POST['titre']) ? $_POST['titre'] : "";
            $type = isset($_POST['type']) ? $_POST['type'] : "";
            $description = isset($_POST['description']) ? $_POST['description'] : "";
            $localisation = isset($_POST['city']) ? $_POST['city'] : "";
            $address = isset($_POST['address']) ? $_POST['address'] : "";
            $budget = isset($_POST['budget']) ? $_POST['budget'] : 0;
            $available_at = isset($_POST['disponsibilite']) ? $_POST['disponsibilite'] : null;
            $move_in_date = isset($_POST['move_in_date']) ? $_POST['move_in_date'] : null;
            $capacite_accueil = isset($_POST['capacite_accueil']) ? $_POST['capacite_accueil'] : 0;
            $equipement = isset($_POST['equipement']) ? $_POST['equipement'] : "";
            $criteres_colocataires = isset($_POST['criteres_colocataires']) ? $_POST['criteres_colocataires'] : "";
            $regle_cohabitation = isset($_POST['regle_cohabitation']) ? $_POST['regle_cohabitation'] : "";


            $demand_type = isset($_POST['demand_type']) ? $_POST['demand_type'] : "";
            $zones_souhaitees = isset($_POST['zones_souhaitees']) ? $_POST['zones_souhaitees'] : "";

            $studentid = $_SESSION['user_id'];

            if (!empty($type)) {
                if ($type === "Offre") {
                    echo "Ceci est une offre.";
                    $galarie = isset($_FILES['images']) ? $_FILES['images'] : null;

                    $galories = $this->insertted($galarie);
                    $result = $this->offer->setAttribut(
                        $type,
                        $localisation,
                        $address,
                        $description,
                        $budget,
                        $available_at,
                        $regle_cohabitation,
                        $criteres_colocataires,
                        $equipement,
                        $capacite_accueil,
                        $galories,
                        $title
                    );
                    $annonce = $this->offer->create_annonce($studentid);
                } else {
                    echo "Ceci est une demande.";
                    echo " annonce" . $type;
                    echo "demand type" . $demand_type;
                    $result = $this->demand->setAttribut(
                        $type,
                        $localisation,
                        $address,
                        $description,
                        $budget,
                        $available_at,
                        $zones_souhaitees,
                        $demand_type,
                        $move_in_date,
                        $title
                    );
                    $annonce = $this->demand->create_annonce($studentid);
                }
            } else {
                echo "Le type d'annonce est invalide.";
            }
        } else {
            echo "nothing";
        }
    }

    public function searchAnnounce()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $title = $data["title"];
        $budget = $data["budget"];
        $city = $data["city"];
        $available_at = $data["available_at"];
        $type = $data["type"];

        header('Content-Type: application/json');

        $results = $this->demand->searchAnnounce($title, $budget, $city, $available_at, $type);

        $cleanResults = [];
        foreach ($results as $row) {
            $cleanResults[] = [
                'announce_id' => $row['announce_id'],
                'user_id' => $row['user_id'],
                'full_name' => $row['full_name'],
                'title' => $row["title"],
                'photo' => $row['photo'],
                'origin_city' => $row['origin_city'],
                'localisation' => $row['localisation'],
                'budget' => $row['budget'],
                'available_at' => $row['available_at'],
                'announce_type' => $row['announce_type']
            ];
        }

        $json = json_encode([
            'data' => $cleanResults,
            'count' => count($cleanResults)
        ], JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_INVALID_UTF8_SUBSTITUTE);

        if ($json === false) {
            throw new Exception(json_last_error_msg());
        }

        echo $json;
    }


    public function showVannonce()
    {
        $announces = $this->offer->all_announce($_SESSION['user_id']);
        extract($announces);
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../core/");
        $dotenv->load();
        extract($_ENV);
        include __DIR__ . "/../views/liste.php";
    }

    public function getOffer()
    {
        $announce_id = $_GET['offer_id'];


        $offres = $this->offer->getoffer($announce_id);

        if (!is_array($offres)) {
            die("Erreur: La demande n'est pas un tableau associatif.");
        }
        extract($offres);

        $galaries = $this->offer->getGalerie($announce_id);

        if (!is_array($galaries)) {
            die("Erreur: La demande n'est pas un tableau associatif.");
        }

        extract($galaries);






        include __DIR__ . "/../views/offer.view.php";
    }

    public function getdemande()
    {
        $announce_id = $_GET['demand_id'];
        $demandes = $this->demand->getdemand($announce_id);

        if (!is_array($demandes)) {
            die("Erreur: La demande n'est pas un tableau associatif.");
        }

        extract($demandes);

        include __DIR__ . "/../views/demande.view.php";
    }
    // public function getphotos(){
    //     $announce_id = $_GET['offer_id'];
    //     $galaries = $this->offer-> getGalerie($announce_id);

    //     if (!is_array($galaries)) {
    //         die("Erreur: La demande n'est pas un tableau associatif.");
    //     }

    //     extract($galaries);

    //     include __DIR__ . "/../views/offer.view.php";
    // }


}
