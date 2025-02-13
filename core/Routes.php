<?php

namespace core;

use app\controllers\UserController;
use app\controllers\AdminController;

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//nroutiw hna s'il vous plus :>
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//=>
$router->route("get", "profile",  new UserController, "showProfile");




// les routes de l'admin : 
$router->route("get", "admin/users", new AdminController, "showViewUser");
$router->route("post", "admin/users/updatestatus", new AdminController, "updateStatus");
$router->route("post", "admin/users/deleteuser", new AdminController, "deleteUser");
$router->route("get", "admin/announces", new AdminController, "showViewAnnounces");
