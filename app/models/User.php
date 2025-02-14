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

    // **************************************************************************************************************************************
    public function showAllUsers()
    {
        $stmt = "SELECT * FROM users";
        return $this->pdo->fetchAll($stmt);
    }

    // **************************************************************************************************************************************
    public function updateStatus($status, $id_user)
    {
        $stmt = "UPDATE users SET status = ? WHERE user_id = ?";
        return $this->pdo->query($stmt, [htmlspecialchars($status), $id_user]);
    }
    // **************************************************************************************************************************************

    public function deleteUser($id_user)
    {
        $stmt = "DELETE FROM users WHERE user_id = ?";
        return $this->pdo->query($stmt, [$id_user]);
    }
    //login user
    public function login($email)
    {
        $stmt = "SELECT * FROM users WHERE email = ?";
        return $this->pdo->fetch($stmt, [$email]);
    }

    //check if user exists
    public function userExists($username, $email)
    {
        $stmt = "SELECT * FROM users WHERE full_name = ? OR email = ?";
        return $this->pdo->fetch($stmt, [$username, $email]);
    }

    //register user
    public function registerUser($username, $email, $password, $year_of_study, $origin_city, $current_city, $bio, $reference, $preferences, $picture)
    { {
            $stmt = "INSERT INTO users (full_name, email, password, year_of_study, origin_city, current_city, bio, reference, preferences, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            return $this->pdo->query($stmt, [
                $username,
                $email,
                $password,
                $year_of_study,
                $origin_city,
                $current_city,
                $bio,
                $reference,
                $preferences,
                $picture
            ]);
        }
    }


    public function addCode($email, $code, $expiry)
    {

        $stmt = "INSERT INTO verifyCode (email, code, expires_at) VALUES (?, ?, ?)";
        return $this->pdo->query($stmt, [
            $email,
            $code,
            $expiry
        ]);
    }

    public function verifyCode($email, $codeVerify)
    {
        $stmt = "SELECT * FROM verifyCode WHERE email = ? AND code = ? AND expires_at > NOW()";
        return $this->pdo->fetch($stmt, [$email, $codeVerify]);
    }

    public function updateStatusByEmail($status, $email)
    {
        $stmt = "UPDATE users SET status = ? WHERE email = ?";
        return $this->pdo->query($stmt, [htmlspecialchars($status), $email]);
    }

    public function deleteCodeByEmail($email)
    {
        $stmt = "DELETE FROM verifyCode WHERE email = ?";
        return $this->pdo->query($stmt, [$email]);
    }



    // reset password function 

    // **********************************************************************************************************************************************************************
    public function getIdByemail($email)
    {

        $stmt = "SELECT user_id FROM users WHERE email = ?";
        return $this->pdo->query($stmt, [$email]);
    }


    // **********************************************************************************************************************************************************************
    public function getEmailByToken($token)
    {
        $stmt = "SELECT email FROM resetPassword WHERE token = ? AND expires_at > NOW()";
        return $this->pdo->fetch($stmt, [$token]);
    }

    public function addToken($email, $token, $expiry)
    {
        $stmt = "INSERT INTO resetPassword(email, token, expires_at) VALUES (?,?,?)";
        return $this->pdo->query($stmt, [$email, $token, $expiry]);
    }
    
    // **********************************************************************************************************************************************************************
    public function restartPassword($userData)
    {
        $stmt = "UPDATE users SET password = ? WHERE email=? ";
        return $this->pdo->query($stmt, [$userData[1], $userData[0]]);
        
    }
    // **********************************************************************************************************************************************************************
    public function deleteToken($email)
    {
            $stmt = "DELETE FROM resetPassword WHERE email = ? ";
            return $this->pdo->query($stmt, [$email]);
            
    }
}
