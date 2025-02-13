<?php

namespace app\models;
use core\Db;


 abstract class Announce{
 protected  $Announce_id;
 protected $localisation;
 protected $address;
 protected $description;
 protected $budget;
 protected $available_at;
 protected $announce_type;
 protected $pdo;


 public function __construct($type,$localisation, $address, $description, $budget, $available_at) {
    $this->pdo = Db::getInstance(); 
    $this->localisation = $localisation;
    $this->address = $address;
    $this->description = $description;
    $this->budget = $budget;
    $this->available_at = $available_at;
    $this->announce_type=$type;
}
    abstract  public function create_annonce($studentid);
    public function all_announce(){
        // $query="SELECT announce.announce_id,announce.address,
        // announce.localisation,announce.description,announce.available_at,announce_type,
        // announce.budget,announce.regle_cohabitation,announce.criteres_colocataire,announce.capacite_accueil
        // ,announce.equipements,announce.zones_souhaitees,announce.demand_type,
        // announce.move_in_date,users.user_id,users.full_name  FROM announce JOIN users ON  announce.user_id=users.user_id";
       $query=" SELECT a.announce_id, a.address, a.localisation, a.description, 
       a.available_at, a.announce_type, a.budget, a.regle_cohabitation, 
       a.criteres_colocataire, a.capacite_accueil, a.equipements, 
       a.zones_souhaitees, a.demand_type, a.move_in_date, 
       u.user_id, u.full_name  
FROM announce a 
JOIN users u ON a.user_id = u.user_id";




    }
    
  









 }











?>