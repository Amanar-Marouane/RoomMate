<?php

namespace core;

use app\controllers\{MessageController, OfferController, UserController, DemandeController, AdminController, AnnonceController};

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

$router->route("get", "register", new UserController, "showRegister")->only("get", "guest");
$router->route("post", "register", new UserController, "register");

$router->route("get", "login", new UserController, "showLogin")->only("get", "guest");
$router->route("post", "login", new UserController, "login");

$router->route("get", "logout", new UserController, "logout")->only("get", "auth");

$router->route("get", "home", new UserController, "showHomePage")->only("get", "auth");
$router->route("get", "profile", new UserController, "showProfile")->only("get", "auth");

$router->route("get", "message/{user_id}", new MessageController, "message")->only("get", "auth");
$router->route("post", "message/{user_id}", new MessageController, "send")->only("post", "auth");

// les routes de l'admin : 
$router->route("get", "admin/users", new AdminController, "showViewUser")->only("get", "admin");
$router->route("post", "admin/users/updatestatus", new AdminController, "updateStatus")->only("post", "admin");
$router->route("post", "admin/users/deleteuser", new AdminController, "deleteUser")->only("post", "admin");
$router->route("get", "admin/announces", new AdminController, "showViewAnnounces")->only("get", "admin");
$router->route("post", "admin/announces/validate", new AdminController, "validation")->only("post", "admin");
$router->route("post", "admin/announces/delete", new AdminController, "deleteAnnounce")->only("post", "admin");
$router->route("post", "profile/deleteannonce", new AdminController, "deleteAnnounce")->only("post", "student");
$router->route("get", "verifycompte", new UserController, "verifyCompteForm");
$router->route("post", "verifycompte", new UserController, "verifyCode");
$router->route("get", "forgotpassword", new UserController, "forgotPassword");
$router->route("post", "forgotpassword", new UserController, "resetPassword");
$router->route("get", "initialpsswd", new UserController, "initialPsswd");
$router->route("post", "initialpsswd", new UserController, "restartPsswd");
$router->route("post", "admin/reports/delete", new AdminController, "deleteReport")->only("post", "admin");
$router->route("post", "admin/reports/ignorerreport", new AdminController, "ignorerReport")->only("post", "admin");
$router->route("post", "annonce/report", new AnnonceController, "addToReport")->only("post", "student");

$router->route("get", "profile/updateannounce/{announce_id}", new AnnonceController, "updateAnnouce")->only("get","student");
$router->route("post", "profile/updateannounce", new AnnonceController, "updateAnnouceForm")->only("post","student");

$router->route("get", "annonce", new AnnonceController, "showAnnonce")->only("get", "auth");

// $router->route("post", "annonce", new AnnonceController, "insertted");
$router->route("post", "annonce", new AnnonceController, "ajoute_annonce")->only("post", "auth");
$router->route("get", "liste", new AnnonceController, "showVannonce")->only("get", "auth");
$router->route("post", "announces/search", new AnnonceController, "searchAnnounce");
$router->route("get", "liste", new AnnonceController, "details")->only("get", "auth");

// route for showing single offer page
// $router->route("get", "offer", new OfferController, "ShowOffer");

// route for showing single offer page
// $router->route("get", "demande", new DemandeController, "ShowDemande");

$router->route("get", "demande", new AnnonceController, "getdemande")->only("get", "auth");
$router->route("get", "offer", new AnnonceController, "getOffer")->only("get", "auth");
// $router->route("get","offer", new AnnonceController, " getphotos");