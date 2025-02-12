<?php

namespace app\controllers;

use app\models\User;

class UserController
{
    private $user;
    public function __construct()
    {
        $this->user = new User;
    }
    public function showProfile()
    {
        $user_id = $_SESSION["user_id"] ?? 1;
        $info = $this->user->userInfo($user_id);
        extract($info);
        include __DIR__ . "/../views/profile.view.php";
    }
}
