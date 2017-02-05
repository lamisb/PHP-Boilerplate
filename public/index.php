<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$commandTest = new \Boilerplate\Commands\BoilerplateCommander();
$commandTest->setCommand("Test");
echo $commandTest->getCommand();