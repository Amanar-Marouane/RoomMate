<?php

namespace core;

<<<<<<< HEAD
use app\controllers\UserController;
use app\controllers\AdminController;
=======
use app\controllers\{MessageController, UserController};
>>>>>>> 0d711b2a02c274a4a3df2f6072cd439fbc931233

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
$router->route("post", "admin/users/updatestatus", new AdminController, "updateStatus");
$router->route("post", "admin/users/deleteuser", new AdminController, "deleteUser");
$router->route("get", "admin/announces", new AdminController, "showViewAnnounces");
=======
$router->route("get", "profile", new UserController, "showProfile");
$router->route("get", "message/{user_id}", new MessageController, "message");
$router->route("post", "message/{user_id}", new MessageController, "send");
$router->route("post", "message/redefine/{user_id}", new MessageController, "redefine");
// route for showing login
$router->route("get", "login", new UserController, "showLogin");

// route for processing login
$router->route("post", "login", new UserController, "login");
>>>>>>> 0d711b2a02c274a4a3df2f6072cd439fbc931233
