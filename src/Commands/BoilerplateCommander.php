<?php
namespace Boilerplate\Commands;

/**
 * Class BoilerplateCommander
 */
class BoilerplateCommander
{
    /**
     * @var String
     */ 
    private $command;

    /**
     * @return String
     */
    public function getCommand() : String
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     * @return BoilerplateCommander
     */
    public function setCommand(String $command) : BoilerplateCommander
    {
        $this->command = $command;
        return $this;
    }
}


