<?php

namespace app\controllers;

use app\models\{User,Demand};

class AdminController
{
    private $admin;
    private $annonce;
    public function __construct()
    {
        $this->admin = new User;
        $this->annonce = new Demand("","","","","","","","","");
    }

    // Gestion de users ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // **************************************************************************************************************************************
    public function showViewUser()
    {
        $info = $this->admin->showAllUsers();
        extract($info);
        include __DIR__ . "/../views/admin/users.view.php";
    }

    // **************************************************************************************************************************************
    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['updateStatusUser'])) {
                $status = htmlspecialchars($_POST['status']);
                $id_user = $_POST['id_user'];
                $info = $this->admin->updateStatus($status, $id_user);
                if ($info) {
                    header("location: /admin/users");
                }
            }
        }
    }

    // **************************************************************************************************************************************
    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['deleteUser'])) {
                $id_user = $_POST['id_user'];
                $info = $this->admin->deleteUser($id_user);
                if ($info) {
                    header("location: /admin/users");
                }
            }
        }
    }


    // Gestion de annonces : ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // **************************************************************************************************************************************
    public function showViewAnnounces()
    {
        $info = $this->annonce->showAllAnnounces();
        extract($info);
        include __DIR__ . "/../views/admin/announces.view.php";
    }
}
