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

    public function showProfile($user_id)
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
}
