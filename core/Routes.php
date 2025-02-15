<?php

namespace core;

use app\controllers\{MessageController, OfferController, UserController, DemandeController, AdminController, AnnonceController};

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

$router->route("get", "register", new UserController, "showRegister")->only("guest");
$router->route("post", "register", new UserController, "register");

$router->route("get", "login", new UserController, "showLogin")->only("guest");
$router->route("post", "login", new UserController, "login");

$router->route("get", "logout", new UserController, "logout")->only("auth");

$router->route("get", "home", new UserController, "showHomePage")->only("auth");
$router->route("get", "profile", new UserController, "showProfile")->only("auth");

$router->route("get", "message/{user_id}", new MessageController, "message")->only("auth");
$router->route("post", "message/{user_id}", new MessageController, "send")->only("auth");

// les routes de l'admin : 
$router->route("get", "admin/users", new AdminController, "showViewUser")->only("admin");
$router->route("post", "admin/users/updatestatus", new AdminController, "updateStatus")->only("admin");
$router->route("post", "admin/users/deleteuser", new AdminController, "deleteUser")->only("admin");
$router->route("get", "admin/announces", new AdminController, "showViewAnnounces")->only("admin");
$router->route("post", "admin/announces/validate", new AdminController, "validation")->only("admin");
$router->route("post", "admin/announces/delete", new AdminController, "deleteAnnounce")->only("admin");
$router->route("post", "profile/deleteannonce", new AdminController, "deleteAnnounce")->only("student");
$router->route("get", "verifycompte", new UserController, "verifyCompteForm")->only("guest");
$router->route("post", "verifycompte", new UserController, "verifyCode")->only("guest");
$router->route("get", "forgotpassword", new UserController, "forgotPassword")->only("guest");
$router->route("post", "forgotpassword", new UserController, "resetPassword")->only("guest");
$router->route("get", "initialpsswd", new UserController, "initialPsswd")->only("guest");
$router->route("post", "initialpsswd", new UserController, "restartPsswd")->only("guest");
$router->route("post", "admin/reports/delete", new AdminController, "deleteReport")->only("admin");
$router->route("post", "admin/reports/ignorerreport", new AdminController, "ignorerReport")->only("admin");
$router->route("post", "annonce/report", new AnnonceController, "addToReport")->only("student");


$router->route("get", "annonce", new AnnonceController, "showAnnonce")->only("auth");

// $router->route("post", "annonce", new AnnonceController, "insertted");
$router->route("post", "annonce", new AnnonceController, "ajoute_annonce")->only("auth");
$router->route("get", "liste", new AnnonceController, "showVannonce")->only("auth");
$router->route("post", "announces/search", new AnnonceController, "searchAnnounce");
$router->route("get", "liste", new AnnonceController, "details")->only("auth");

// route for showing single offer page
// $router->route("get", "offer", new OfferController, "ShowOffer");

// route for showing single offer page
// $router->route("get", "demande", new DemandeController, "ShowDemande");

$router->route("get", "demande", new AnnonceController, "getdemande")->only("auth");
$router->route("get", "offer", new AnnonceController, "getOffer")->only("auth");
// $router->route("get","offer", new AnnonceController, " getphotos");