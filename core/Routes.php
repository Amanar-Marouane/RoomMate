<?php

namespace core;

<<<<<<< HEAD
use app\controllers\{UserController, AdminController};
=======
use app\controllers\{MessageController, UserController,AnnonceController};
>>>>>>> 9a4483600f689b922cb26aead4f0ab5059096094

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//nroutiw hna s'il vous plus :>
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//=>
<<<<<<< HEAD
$router->route("get", "profile",  new UserController, "showProfile");
// les routes de l'admin : 
$router->route("get", "admin/users", new AdminController, "showViewUser");
=======
$router->route("get", "profile", new UserController, "showProfile");
$router->route("get", "message/{user_id}", new MessageController, "message");
$router->route("post", "message/{user_id}", new MessageController, "send");
$router->route("post", "message/redefine/{user_id}", new MessageController, "redefine");
// route for showing login
$router->route("get", "login", new UserController, "showLogin");

// route for processing login
$router->route("post", "login", new UserController, "login");
$router->route("get", "annonce", new AnnonceController, "showAnnonce");
// $router->route("post", "annonce", new AnnonceController, "insertted");
$router->route("post", "annonce", new AnnonceController, "ajoute_annonce");
>>>>>>> 9a4483600f689b922cb26aead4f0ab5059096094
