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

    public function showAllAnnounces()
    {
        $stmt = "SELECT * FROM announce";
        return $this->pdo->fetchAll($stmt);
    }
    
}
