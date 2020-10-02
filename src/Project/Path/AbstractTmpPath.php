<?php

namespace Nemundo\Project\Path;

use Nemundo\Project\ProjectConfig;

abstract class AbstractTmpPath extends AbstractProjectPath
{


    public function __construct()
    {

        $this->addPath(ProjectConfig::$projectPath);
        $this->addPath('tmp');

        parent::__construct();

        //$this->addPath('tmp');
        //$this->loadPath();

    }


    /*
    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('tmp');

    }*/

}