<?php

namespace app\models;

use core\Db;

class Message
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    public function get_chat($user_id)
    {
        $stmt = "SELECT messages.*, u1.full_name AS user_src_name, u1.photo
                FROM messages
                JOIN users AS u1 ON u1.user_id = messages.user_src_id
                WHERE (user_src_id = ? AND user_dest_id = ?) 
                OR (user_src_id = ? AND user_dest_id = ?)
                ORDER BY date_message
                ";
        return $this->pdo->fetchAll($stmt, [$user_id, 1, 1, $user_id]);
    }

    public function send($user_dest_id, $content)
    {
        $stmt = "INSERT INTO messages (user_src_id, user_dest_id, content) VALUES (?, ?, ?)";
        return $this->pdo->query($stmt, [1, $user_dest_id, $content]);
    }

    public function redefine($user_id){
        $stmt = "SELECT user_id, photo, full_name FROM users WHERE user_id = ?";
        return $this->pdo->fetch($stmt, [$user_id]);
    }
}
