<?php
namespace Boilerplate\Controllers;

use Silex\Application;

/**
 * Class BoilerplateController
 * @package Boilerplate\Controllers
 */
class BoilerplateController
{

    /**
     * @var Application
     */
    private $app;

    /**
     * BoilerplateController constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return string
     */
    public function indexAction() {
        $bCommander1 =  $this->app['boilerplate_commander'];
        $bCommander2 =  $this->app['boilerplate_commander'];
        $bCommander3 =  $this->app['boilerplate_commander'];
        echo $bCommander1->getCommand().PHP_EOL;
        echo $bCommander2->getCommand().PHP_EOL;
        echo $bCommander3->getCommand().PHP_EOL;

        $bCommander1u =  $this->app['boilerplate_commander_unique'];
        $bCommander2u =  $this->app['boilerplate_commander_unique'];
        $bCommander3u =  $this->app['boilerplate_commander_unique'];
        echo $bCommander1u->getCommand().PHP_EOL;
        echo $bCommander2u->getCommand().PHP_EOL;
        echo $bCommander3u->getCommand().PHP_EOL;
//        die();
        return "Well hello there!!!";
    }

    /**
     * @return string
     */
    public function testAction($id) {
        return $id;
    }
}


