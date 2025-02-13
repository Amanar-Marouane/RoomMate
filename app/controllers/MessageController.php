<?php

namespace app\controllers;

use __PHP_Incomplete_Class;
use app\models\Message;

class MessageController
{
    private $linker;

    public function __construct()
    {
        $this->linker = new Message;
    }

    public function message($user_id)
    {
        $messages = $this->linker->get_chat($user_id, $_SESSION['user_id']);
        include __DIR__ . "/../views/message.view.php";
    }

    public function send($user_dest_id)
    {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        $message = $data['content'];
        $this->linker->send($user_dest_id, $message);
    }

    public function redefine($user_id)
    {
        $info = $this->linker->redefine($user_id);
        echo json_encode($info);
    }
}
