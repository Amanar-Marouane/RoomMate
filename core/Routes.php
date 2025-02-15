<?php

namespace core;

use app\controllers\{MessageController, OfferController, UserController, DemandeController, AdminController, AnnonceController};

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//nroutiw hna s'il vous plus :>
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//=>
// route for showing refister
$router->route("get", "register", new UserController, "showRegister");


$router->route("get", "home", new UserController, "showHomePage");



// route for processing register
$router->route("post", "register", new UserController, "register");
$router->route("get", "profile", new UserController, "showProfile");
$router->route("get", "message/{user_id}", new MessageController, "message");
$router->route("post", "message/{user_id}", new MessageController, "send");
$router->route("post", "message/redefine/{user_id}", new MessageController, "redefine");

// les routes de l'admin : 
$router->route("get", "admin/users", new AdminController, "showViewUser");  // admin
$router->route("post", "admin/users/updatestatus", new AdminController, "updateStatus");  // admin
$router->route("post", "admin/users/deleteuser", new AdminController, "deleteUser");  // admin
$router->route("get", "admin/reports", new AdminController, "showViewReports");  // admin
$router->route("get", "admin/announces", new AdminController, "showViewAnnounces");  // admin
$router->route("post", "admin/announces/validate", new AdminController, "validation");  // admin
$router->route("post", "admin/announces/delete", new AdminController, "deleteAnnounce"); // admin
$router->route("get", "verifycompte", new UserController, "verifyCompteForm"); // all
$router->route("post", "verifycompte", new UserController, "verifyCode"); // all
$router->route("get", "forgotpassword", new UserController, "forgotPassword"); // all
$router->route("post", "forgotpassword", new UserController, "resetPassword"); // all
$router->route("get", "initialpsswd", new UserController, "initialPsswd"); // all
$router->route("post", "initialpsswd", new UserController, "restartPsswd"); // all
$router->route("post", "profile/deleteannonce", new AdminController, "deleteAnnounce"); //student
$router->route("post", "admin/reports/delete", new AdminController, "deleteReport");  // admin
$router->route("post", "admin/reports/ignorerreport", new AdminController, "ignorerReport");  // admin
$router->route("post", "annonce/report", new AnnonceController, "addToReport");

// route for showing login
$router->route("get", "login", new UserController, "showLogin");

// route for processing login
$router->route("post", "login", new UserController, "login");
$router->route("get", "annonce", new AnnonceController, "showAnnonce");

// $router->route("post", "annonce", new AnnonceController, "insertted");
$router->route("post", "annonce", new AnnonceController, "ajoute_annonce");
$router->route("get", "liste", new AnnonceController, "showVannonce");
$router->route("post", "announces/search", new AnnonceController, "searchAnnounce");
$router->route("get", "liste", new AnnonceController, "details");


// route for showing refister
$router->route("get", "register", new UserController, "showRegister");

// route for processing register
$router->route("post", "register", new UserController, "register");


// route for showing single offer page
// $router->route("get", "offer", new OfferController, "ShowOffer");

// route for showing single offer page
// $router->route("get", "demande", new DemandeController, "ShowDemande");

$router->route("get", "demande", new AnnonceController, "getdemande");
$router->route("get", "offer", new AnnonceController, "getOffer");
// $router->route("get","offer", new AnnonceController, " getphotos");