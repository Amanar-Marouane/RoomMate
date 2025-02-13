<?php

namespace core;

use app\controllers\{UserController, AdminController};

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