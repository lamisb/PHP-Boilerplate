<?php
require_once dirname(__DIR__). '/vendor/autoload.php';

$env = file_get_contents(dirname(__DIR__). '/.env');


$app = new Silex\Application();

require dirname(__DIR__) . '/config/register.php';
require dirname(__DIR__) .'/config/services.php';
require dirname(__DIR__) .'/config/routes.php';

if('develop' == strtolower($env)) {
    $app['debug'] = true;
}

$app->run();

