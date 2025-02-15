<?php

namespace app\controllers;

use app\models\Message;
use Dotenv\Dotenv;

class MessageController
{
    private $linker;

    public function __construct()
    {
        $this->linker = new Message;
    }

    public function message($user_id)
    {
        if ($user_id == $_SESSION['user_id']) header("Location: /profile");
        $messages = $this->linker->get_chat($user_id, $_SESSION['user_id']);
        $person = $this->linker->redefine($user_id);
        extract($person, EXTR_PREFIX_ALL, "to");
        $person = $this->linker->redefine($_SESSION['user_id']);
        extract($person, EXTR_PREFIX_ALL, "my");
        $history = $this->linker->conversations_history($_SESSION['user_id']);

        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../core/");
        $dotenv->load();
        extract($_ENV);
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
