<?php

namespace app\controllers;

use app\models\{User, Demand};

class AdminController
{
    private $admin;
    private $annonce;
    public function __construct()
    {
        $this->admin = new User;
        $this->annonce = new Demand;
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
    public function showViewReports()
    {
        $info = $this->annonce->showAllReports();
        extract($info);
        include __DIR__ . "/../views/admin/reports.view.php";
    }
    public function showViewAnnounces()
    {
        $info = $this->annonce->showAllAnnounces();
        extract($info);
        include __DIR__ . "/../views/admin/announces.view.php";
    }

    // **************************************************************************************************************************************
    public function validation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btn_validate'])) {
                $validate = htmlspecialchars($_POST['validate']);
                $id_announce = $_POST['id_announce'];
                $info = $this->annonce->validationAnnounce($validate, $id_announce);
                if ($info) {
                    header("location: /admin/announces");
                }
            }
        }
    }

    // **************************************************************************************************************************************
    public function deleteAnnounce()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btn_delete_announce'])) {
                $id_announce = $_POST['id_announce'];
                $info = $this->annonce->deleteAnnounce($id_announce);
                if ($info && $_SESSION['role'] === "admin") {
                    header("location: /admin/announces");
                } elseif ($info && $_SESSION['role'] === "student") {
                    header("location: /profile");
                }
            }
        }
    }

    // **************************************************************************************************************************************
    public function deleteReport()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btn_delete_reports'])) {
                $id_announce = $_POST['id_announce'];
                $info = $this->annonce->deleteAnnounce($id_announce);
                if ($info) {
                    header("location: /admin/reports");
                }
            }
        }
    }

    // **************************************************************************************************************************************
    public function ignorerReport()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['btn_report'])) {
                $ignorer = htmlspecialchars($_POST['report']);
                $id_announce = $_POST['id_announce'];
                $info = $this->annonce->ignorerReport($ignorer, $id_announce);
                if ($info) {
                    header("location: /admin/reports");
                }
            }
        }
    }
}
