<?php
namespace Boilerplate\Controllers;

use Silex\Application;

/**
 * Class BoilerplateController
 * @package Boilerplate\Controllers
 */
class BoilerplateController extends BaseController
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

        return $this->getTwigService()->render('boiler/charts.twig', array(
            'movies' => [],
            'execute_time' => '0'
        ));
    }

    /**
     * @return Twig
     */
    private function getTwigService()
    {
        return $this->app['twig'];
    }
}


