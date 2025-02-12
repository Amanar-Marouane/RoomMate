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

    public function message($user_id = 2)
    {
        $messages = $this->linker->get_chat($user_id);
        include __DIR__ . "/../views/message.view.php";
    }

    public function send($user_dest_id)
    {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        $message = $data['content'];
        $this->linker->send($user_dest_id, $message);
    }
}
