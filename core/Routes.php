<?php

namespace core;

use app\controllers\{UserController};

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//nroutiw hna s'il vous plus :>
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//=>
$router->route("get", "profile", new UserController, "showProfile");

// route for showing login
$router->route("get", "login", new UserController, "showLogin");

// route for processing login
$router->route("post", "login", new UserController, "login");
