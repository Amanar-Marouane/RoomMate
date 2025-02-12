<?php

namespace app\controllers;

use app\models\User;

class AdminController
{
    private $admin;
    public function __construct()
    {
        $this->admin = new User;
    }
    public function showViewUser()
    {
        // echo 'test';
        $info = $this->admin->showAllUsers();
        extract($info);
        include __DIR__ . "/../views/admin/users.view.php";
    }
}
