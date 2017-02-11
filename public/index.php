<?php
require_once dirname(__DIR__). '/vendor/autoload.php';

$env = file_get_contents(dirname(__DIR__). '/.env');

$app = new Silex\Application();

if(!in_array(trim($env),['production', 'development'])) {
    Throw new \ErrorException("Something wrong happened, cannot proceed");
}
$env = file_get_contents(dirname(__DIR__). '/.env');

require dirname(__DIR__) . "/config/$env/config.php";
require dirname(__DIR__) . '/config/register.php';
require dirname(__DIR__) .'/config/services.php';
require dirname(__DIR__) .'/config/routes.php';

$app->run();

