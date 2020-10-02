<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\ProjectConfig;

abstract class AbstractProjectPath extends AbstractPath
{


    public function __construct()
    {

        $this->addPath(ProjectConfig::$projectPath);
        parent::__construct();

        //$this->path = new TextDirectory();

        //$this->loadBase();
        //$this->addPath(ProjectConfig::$projectPath);
        //$this->loadPath();
        //parent::__construct();



    }



    /*protected function loadProjectPath() {

    }*/




    /*
    public function __construct($path = null)
    {
        $this->addPath(ProjectConfig::$projectPath);
        parent::__construct($path);
    }

    /*
    protected function loadPath()
    {
        $this->addPath(ProjectConfig::$projectPath);
    }*/

}