<?php

namespace app\models;

use core\Db;


abstract class Announce
{
    protected  $Announce_id;
    protected $localisation;
    protected $address;
    protected $description;
    protected $budget;
    protected $available_at;
    protected $announce_type;
    protected $pdo;


    public function __construct($type, $localisation, $address, $description, $budget, $available_at)
    {
        $this->pdo = Db::getInstance();
        $this->localisation = $localisation;
        $this->address = $address;
        $this->description = $description;
        $this->budget = $budget;
        $this->available_at = $available_at;
        $this->announce_type = $type;
    }


    abstract  public function create_annonce($studentid);


    // gestion de annonce par student : 
    public function ShowMyAnnounce($id_user, $typeAnnounce)
    {
        $stmt = "SELECT 
                a.announce_id,
                a.localisation,
                a.address,
                a.description,
                a.available_at,
                a.created_at,
                a.announce_type,
                a.budget,
                a.is_valide,
                a.regles_cohabitation,
                a.criteres_colocataire,
                a.capacite_accueil,
                a.equipements,
                a.zones_souhaitees,
                a.demand_type,
                a.move_in_date,
                u.full_name,
                u.current_city
            FROM announce a
            JOIN users u ON a.user_id = u.user_id
            WHERE u.user_id = ? AND a.announce_type = ? ;
            ";
        return $this->pdo->fetchAll($stmt,[13, $typeAnnounce]);
    }
    
    // gestion de annonce par admin : 
    public function showAllAnnounces()
    {
        $stmt = "SELECT 
                a.announce_id,
                a.localisation,
                a.address,
                a.description,
                a.available_at,
                a.created_at,
                a.announce_type,
                a.budget,
                a.is_valide,
                a.regles_cohabitation,
                a.criteres_colocataire,
                a.capacite_accueil,
                a.equipements,
                a.zones_souhaitees,
                a.demand_type,
                a.move_in_date,
                u.full_name,
                u.current_city
            FROM announce a
            JOIN users u ON a.user_id = u.user_id
            ";
        return $this->pdo->fetchAll($stmt);
    }


    public function validationAnnounce($validate, $id_announce)
    {
        $stmt = "UPDATE announce SET is_valide = ? WHERE announce_id = ?";
        return $this->pdo->query($stmt, [htmlspecialchars($validate), $id_announce]);
    }

    public function deleteAnnounce($id_announce)
    {
        $stmt = "DELETE FROM announce WHERE announce_id = ?";
        return $this->pdo->query($stmt, [$id_announce]);
    }
}
