<?php


namespace Nemundo\App\Linux\Cmd;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractCmd extends AbstractBase
{

    public $label;

    public $command;

    //public $description;


    abstract protected function loadCmd();


    //abstract public function getCmd();

    public function getCmd() {

        return $this->command;

    }

}