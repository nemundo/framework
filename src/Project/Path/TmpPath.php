<?php

namespace Nemundo\Project\Path;

use Nemundo\Project\ProjectConfig;

class TmpPath extends ProjectPath
{

/*
    public function __construct()
    {

        $this->addPath(ProjectConfig::$projectPath);
        $this->addPath('tmp');

        parent::__construct();

        //$this->addPath('tmp');
        //$this->loadPath();

    }*/



    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('tmp');

    }

}