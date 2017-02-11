<?php

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => dirname(__DIR__) . '/src/Views',
    'twig.options'    => array(
        'cache' =>   '/tmp/cache',  //Set outside the app due vagrant permission problem
    ),
));
