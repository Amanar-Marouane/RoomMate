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

    //login user
    public function login($email){
       $stmt = "SELECT * FROM users WHERE email = ?";
       return $this->pdo->fetch($stmt, [$email]);
    }

    //check if user exists
    public function userExists($username, $email){
      $stmt = "SELECT * FROM users WHERE full_name = ? OR email = ?";
      return $this->pdo->fetch($stmt, [$username, $email]);
       
    }

    //register user
    public function registerUser($username, $email, $password, $year_of_study, $origin_city, $current_city, $bio, $photo, $reference, $preferences){ {
        $stmt = "INSERT INTO users (full_name, email, password, year_of_study, origin_city, current_city, bio, photo, reference, preferences) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->pdo->query($stmt, [
            $username, $email, $password, $year_of_study, $origin_city, $current_city, $bio, $photo, $reference, $preferences
        ]);    }
}
}
