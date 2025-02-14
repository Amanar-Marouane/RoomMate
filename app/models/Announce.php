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


    public function showAllAnnounces() {
        $stmt = "SELECT * FROM announce";
        return $this->pdo->fetchAll($stmt);
    }
}
