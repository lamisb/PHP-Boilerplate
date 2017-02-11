<?php

$app->get('/test/{id}', "boilerplate.controller::test")
    ->assert('id', '\d+');

$app->get('/', "boilerplate.controller:indexAction");
