<?php

$app['boilerplate.controller'] = function() use ($app) {
    return new \Boilerplate\Controllers\BoilerplateController($app);
};


/**
 * @return \Boilerplate\Commands\BoilerplateCommander
 */
$app['boilerplate_commander'] = function () {
    return (new Boilerplate\Commands\BoilerplateCommander())->setCommand(rand(1,1000));
};


/**
 * @return \Boilerplate\Commands\BoilerplateCommander
 */
$app['boilerplate_commander_unique'] = $app->factory(function () {
    return (new Boilerplate\Commands\BoilerplateCommander())->setCommand(rand(1,1000));
});
