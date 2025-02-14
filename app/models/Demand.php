<?php

namespace app\models;

use app\models\Announce;
use core\Db;

class Demand extends Announce
{
  private  $zones_souhaitees;
  private $demand_type;
  protected $pdo;

  private $move_in_date;
  public function __construct(
    $type = "",
    $localisation = "",
    $address = "",
    $description = "",
    $budget = 0,
    $available_at = null,
    $zones_souhaitees = "",
    $demand_type = "",
    $move_in_date = null
  ) {

    parent::__construct($type, $localisation, $address, $description, $budget, $available_at);


    $this->demand_type = $demand_type;
    $this->zones_souhaitees = $zones_souhaitees;
    $this->move_in_date = $move_in_date;
    $this->pdo = Db::getInstance();
  }
  public function getAttribut()
  {
    return [
      'localisation' => $this->localisation,
      'address' => $this->address,
      'description' => $this->description,
      'budget' => $this->budget,
      'available_at' => $this->available_at,
      'zones_souhaitees' => $this->zones_souhaitees,
      'move_in_date' => $this->move_in_date,
      'demand_type' => $this->demand_type,
      'type' => $this->announce_type,


    ];
  }
  public function setAttribut($type, $localisation, $address, $description, $budget, $available_at, $zones_souhaitees, $demand_type, $move_in_date)
  {
    return [
      $this->localisation = $localisation,
      $this->address = $address,
      $this->description = $description,
      $this->budget = $budget,
      $this->available_at = $available_at,
      $this->zones_souhaitees = $zones_souhaitees,
      $this->move_in_date = $move_in_date,
      $this->demand_type = $demand_type,
      $this->announce_type = $type,
      $this->title


    ];
  }

  public function create_annonce($studentid)
  {


    $query = "INSERT INTO announce (user_id, localisation, address, description, 
                 available_at, announce_type, budget, zones_souhaitees, demand_type, move_in_date,title) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    $params = [
      $studentid,
      $this->localisation,
      $this->address,
      $this->description,
      $this->available_at,
      $this->announce_type,
      $this->budget,
      $this->zones_souhaitees,
      $this->demand_type,
      $this->move_in_date,
      $this->title
    ];
    $db = $this->pdo;
    $db->query($query, $params);

    return "Annonce créée avec succès !";
  }
  public function getdemand($announce_id)
  {
    $query = "SELECT a.announce_id, a.address, a.localisation, a.description, a.title,
                    a.available_at, a.announce_type, a.budget, a.regles_cohabitation, 
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

  public function searchAnnounce(string $search, array $budget, string $city, string $available_at, string $type)
  {
    $min_budget = $budget[0] ?? null;
    $max_budget = $budget[1] ?? null;

    $stmt = "SELECT announce.*, users.full_name, users.photo, users.origin_city
            FROM announce
            JOIN users ON users.user_id = announce.user_id
            WHERE title LIKE ? AND description LIKE ?";
    $params = ["%$search%", "%$search%"];

    if (!empty($min_budget)) {
      $stmt .= " AND budget >= ?";
      $params[] = $min_budget;
    }

    if (!empty($max_budget)) {
      $stmt .= " AND budget <= ?";
      $params[] = $max_budget;
    }

    if (!empty($city)) {
      $stmt .= " AND localisation LIKE ?";
      $params[] = "%$city%";
    }

    if (!empty($available_at)) {
      $stmt .= " AND available_at <= ?";
      $params[] = $available_at;
    }

    if (!empty($type)) {
      $stmt .= " AND announce_type = ?";
      $params[] = $type;
    }

    $results = $this->pdo->fetchAll($stmt, $params);

    return $results ?: [];
  }
}
