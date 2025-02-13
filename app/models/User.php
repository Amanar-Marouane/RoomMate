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

    public function showAllUsers()
    {
        $stmt = "SELECT * FROM users";
        return $this->pdo->fetchAll($stmt);
    }

    //login user
    public function login($email){
       $stmt = "SELECT * FROM users WHERE email = ?";
       return $this->pdo->fetch($stmt, [$email]);
    }

    //check if user exists
    public function userExists($username, $email){
      $stmt = "SELECT * FROM users WHERE username = ? OR email = ?";
      return $this->pdo->fetch($stmt, [$username, $email]);
       
    }

    //register new user
    // public function registerUser($username, $email, $password, $role){
    //    if($data['role'] == "tutor"){
    //        $stmt = $this->pdo->query("INSERT INTO users (username, email, password, role, status) VALUES (:username, :email, :password, :role, 'active')");
    //        $query->bindParam(":username", $data['username']);
    //        $query->bindParam(":email", $data['email']);
    //        $query->bindParam(":password", $data['password']);
    //        $query->bindParam(":role", $data['role']);
    //        $this->pdo->fetch($stmt, [$username, $email]);

    //        if( $query->execute()){
    //             return true;
    //        }else{
    //             return false;
    //        }
    //    }else{
    //        $stmt = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    //        return $this->pdo->fetch($stmt, [$username, $email, $password, $role]);

    //        if( $query->execute()){
    //             return true;
    //        }else{
    //             return false;
    //        }
    //    }
    // }
}
