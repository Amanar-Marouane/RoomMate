<?php

require dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . "/MyChat.php";

use Ratchet\Server\IoServer;

$server = IoServer::factory(
    new \core\MyChat(),
    8000
);

$server->run();
