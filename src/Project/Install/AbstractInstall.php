<?php


namespace Nemundo\Project\Install;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractInstall extends AbstractBase
{

    // public static $done;
    // only run once


    abstract public function install();

}