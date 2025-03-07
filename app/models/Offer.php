<?php

namespace app\models;

use app\models\Announce;
use PDOException;

class Offer extends Announce
{
    private  $regle_cohabitation;
    private $criteres_colocataires;
    private $equipement;
    private $capacite_accueil;
    private $galorie = [];


    public function __construct(
        $type = "",
        $localisation = "",
        $address = "",
        $description = "",
        $budget = 0,
        $available_at = null,
        $regles = "",
        $criteres = "",
        $equipement = "",
        $capacites = "",
        $galorie = [],
        $title = ""
    ) {

        parent::__construct($type, $localisation, $address, $description, $budget, $available_at);


        $this->regle_cohabitation = $regles;
        $this->criteres_colocataires = $criteres;
        $this->equipement = $equipement;
        $this->capacite_accueil = $capacites;
    }
    public function getAttribut()
    {
        return [
            'localisation' => $this->localisation,
            'address' => $this->address,
            'description' => $this->description,
            'budget' => $this->budget,
            'available_at' => $this->available_at,
            'regle_cohabitation' => $this->regle_cohabitation,
            'criteres_colocataires' => $this->criteres_colocataires,
            'equipement' => $this->equipement,
            'capacite_accueil' => $this->capacite_accueil,
            'annonce_type' => $this->announce_type
        ];
    }
    public function setAttribut(
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
        array $galorie,
        $title
    ) {
        return [
            $this->localisation = $localisation,
            $this->address = $address,
            $this->description = $description,
            $this->budget = $budget,
            $this->available_at = $available_at,
            $this->regle_cohabitation = $regle_cohabitation,
            $this->criteres_colocataires = $criteres_colocataires,
            $this->equipement = $equipement,
            $this->capacite_accueil = $capacite_accueil,
            $this->announce_type = $type,
            $this->galorie = $galorie,
            $this->title = $title
        ];
    }



    public function create_annonce($studentid)
    {
        try {

            $this->pdo->transaction();
            $query = "INSERT INTO announce(user_id,localisation,address,description,
                    available_at,announce_type,budget,regles_cohabitation,criteres_colocataire,
                    capacite_accueil,equipements,title) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $params = [
                $studentid,
                $this->localisation,
                $this->address,
                $this->description,
                $this->available_at,
                $this->announce_type,
                $this->budget,
                $this->regle_cohabitation,
                $this->criteres_colocataires,
                $this->capacite_accueil,
                $this->equipement,
                $this->title
            ];

            $db = $this->pdo;
            $db->query($query, $params);

            $idOffer = $db->lastInsertId();

            $querypicture = "INSERT INTO announce_media(announce_id,media) VALUES (?,?)";

            foreach ($this->galorie as $picture) {

                $parametres = [$idOffer, $picture['stored_name']];
                $db->query($querypicture, $parametres);
            }


            return $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollback();
            return "Erreur: " . $e->getMessage();
        }
    }


    public function getoffer($announce_id)
    {
        $query = "SELECT a.announce_id, a.address, a.localisation, a.description, a.title,
                        a.available_at, a.announce_type, a.budget, a.regles_cohabitation, a.is_reported,
                        a.criteres_colocataire, a.capacite_accueil, a.equipements, 
                        a.zones_souhaitees, a.demand_type, a.move_in_date,
                        u.user_id, u.full_name , u.origin_city,u.photo
                        FROM announce a 
                        JOIN users u ON a.user_id = u.user_id WHERE a
                        .announce_id = ? ";
        $params = [$announce_id];
        $db = $this->pdo;
        return $db->fetchAll($query, $params);
    }

    public function getGalerie($announce_id)
    {
        $query = "SELECT m.media,m.media_id, a.announce_id FROM announce_media m LEFT JOIN announce a 
         ON m.announce_id=a.announce_id WHERE m.announce_id=?";
        $params = [$announce_id];
        $db = $this->pdo;
        $test = $db->fetchAll($query, $params);

        return $test;
    }

    public function update_offer(
        $announce_id,
        $title,
        $description,
        $localisation,
        $address,
        $available_at,
        $budget,
        $criteres_colocataires,
        $regle_cohabitation,
        $capacite_accueil,
        $equipement
    ) {
        $query = "UPDATE announce SET 
                    title = ? ,
                    description = ?,
                    localisation = ?,
                    address = ?,
                    available_at = ?,
                    budget = ?,
                    criteres_colocataire = ?,
                    regles_cohabitation = ?,
                    capacite_accueil = ?,
                    equipements = ?
                    WHERE announce_id = ? ";
        $params = [
            $title,
            $description,
            $localisation,
            $address,
            $available_at,
            $budget,
            $criteres_colocataires,
            $regle_cohabitation,
            $capacite_accueil,
            $equipement,
            $announce_id
        ];

        $db = $this->pdo;
        return $db->query($query, $params);
    }
}
