<?php

namespace BoilerplateTest\Commands;

use Boilerplate\Commands\BoilerplateCommander;
use PHPUnit\Framework\TestCase;


class BoilerplateCommanderTest extends TestCase
{
    /**
     * @var BoilerplateCommander
     */
    private $boilerplateCommander;

    public function __construct()
    {
        $this->boilerplateCommander = new BoilerplateCommander();
    }

    public function testSetterAndGetterForCommand()
    {
        $this->boilerplateCommander->setCommand("fake");
        $this->assertEquals("fake", $this->boilerplateCommander->getCommand());

    }
}