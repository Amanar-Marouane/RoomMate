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
    protected $title;


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
    public function all_announce($userid)
    {

        $query = " SELECT a.announce_id, a.address, a.localisation, a.description, a.title,
                    a.available_at, a.announce_type, a.budget, a.regles_cohabitation, 
                    a.criteres_colocataire, a.capacite_accueil, a.equipements, 
                    a.zones_souhaitees, a.demand_type, a.move_in_date,
                    u.user_id, u.full_name , u.origin_city,u.photo
                    FROM announce a 
                    JOIN users u ON a.user_id = u.user_id WHERE u
                    .user_id != ?";
        $db = $this->pdo;
        $params = [$userid];
        return $result = $db->fetchAll($query, $params);
    }

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
        return $this->pdo->fetchAll($stmt,[$id_user, $typeAnnounce]);
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
    
    
    // gestion de annonce par admin : 
    public function showAllReports()
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
                a.is_reported,
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
            WHERE a.is_reported = 1 ;
            ";
        return $this->pdo->fetchAll($stmt);
    }

    public function ignorerReport($ignorer, $id_announce){
        $stmt = "UPDATE announce SET is_reported = ? WHERE announce_id = ?";
        return $this->pdo->query($stmt, [$ignorer, $id_announce]);
    }



    public function five_announce()
    {

        $query = " SELECT a.announce_id, a.address, a.localisation, a.description, a.title,
                    a.available_at, a.announce_type, a.budget, a.regles_cohabitation, 
                    a.criteres_colocataire, a.capacite_accueil, a.equipements, 
                    a.zones_souhaitees, a.demand_type, a.move_in_date,
                    u.user_id, u.full_name , u.origin_city,u.photo
                    FROM announce a 
                    JOIN users u ON a.user_id = u.user_id ORDER BY a.announce_id DESC LIMIT 5";
        $db = $this->pdo;
        return $result = $db->fetchAll($query);
    }
}
