<?php


namespace Nemundo\App\Linux\Service;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractService extends AbstractBase
{

    abstract public function start();

    abstract public function stop();

    abstract public function restart();

}