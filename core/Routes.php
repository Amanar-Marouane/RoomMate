<?php

namespace core;

use app\controllers\{UserController,AnnonceController};

require_once __DIR__ . "/Functions.php";
require_once __DIR__ . "/AutoLoader.php";
AutoLoader::autoloader();

$router = new Router;

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//nroutiw hna s'il vous plus :>
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//=>
$router->route("get", "profile", new UserController, "showProfile");
$router->route("get", "annonce", new AnnonceController, "showAnnonce");
// $router->route("post", "annonce", new AnnonceController, "insertted");
$router->route("post", "annonce", new AnnonceController, "ajoute_annonce");