<?php

namespace app\models;

use app\models\Announce;

class Demand extends Announce
{
  private  $zones_souhaitees;
  private $demand_type;

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
      'type' => $this->announce_type

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
      $this->announce_type = $type


    ];
  }

  public function create_annonce($studentid)
  {


    $query = "INSERT INTO announce (user_id, localisation, address, description, 
                 available_at, announce_type, budget, zones_souhaitees, demand_type, move_in_date) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
      $this->move_in_date
    ];
    $db = $this->pdo;
    $db->query($query, $params);

    return "Annonce créée avec succès !";
  }

  public function searchAnnounce(string $search, array $budget, string $city, string $available_at)
  {
    $min_budget = $budget[0] ?? null;
    $max_budget = $budget[1] ?? null;

    $stmt = "SELECT * FROM announces WHERE title LIKE ? ";
    $params = ["%$search%"];

    if (!empty($min_budget)) {
      $stmt .= "AND budget LIKE ? ";
      $params[] = "$min_budget%";
    }
    if (!empty($max_budget)) {
      $stmt .= "AND budget <= ? ";
      $params[] = $max_budget;
    }

    if (!empty($city)) {
      $stmt .= "AND city LIKE ? ";
      $params[] = "%$city%";
    }
    if (!empty($available_at)) {
      $stmt .= "AND available_at LIKE ? ";
      $params[] = "%$available_at%";
    }

    return $this->pdo->fetchAll($stmt, $params);
  }
}
