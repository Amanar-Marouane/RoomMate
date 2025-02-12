<?php

namespace core;

use app\controllers\{MessageController, UserController};

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
