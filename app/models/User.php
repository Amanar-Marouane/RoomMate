<?php

namespace app\models;

use core\Db;

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    public function userInfo($user_id)
    {
        $stmt = "SELECT * FROM users WHERE user_id = ?";
        return $this->pdo->fetch($stmt, [$user_id]);
    }
}
