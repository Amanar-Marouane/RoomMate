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

$router->route("get", "profile", new UserController, "showProfile");
$router->route("get", "message/{user_id}", new MessageController, "message");
$router->route("post", "message/{user_id}", new MessageController, "send");
$router->route("post", "message/redefine/{user_id}", new MessageController, "redefine");

// les routes de l'admin : 
$router->route("get", "admin/users", new AdminController, "showViewUser");
$router->route("post", "admin/users/updatestatus", new AdminController, "updateStatus");
$router->route("post", "admin/users/deleteuser", new AdminController, "deleteUser");
$router->route("get", "admin/announces", new AdminController, "showViewAnnounces");

// route for showing login
$router->route("get", "login", new UserController, "showLogin");

// route for processing login
$router->route("post", "login", new UserController, "login");
$router->route("get", "annonce", new AnnonceController, "showAnnonce");

// $router->route("post", "annonce", new AnnonceController, "insertted");
$router->route("post", "annonce", new AnnonceController, "ajoute_annonce");

// route for showing refister
$router->route("get", "register", new UserController, "showRegister");

// route for processing register
$router->route("post", "register", new UserController, "register");


// route for showing single offer page
$router->route("get", "offer", new OfferController, "ShowOffer");

// route for showing single offer page
$router->route("get", "demande", new DemandeController, "ShowDemande");
