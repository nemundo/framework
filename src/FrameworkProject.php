<?php

namespace Nemundo;

use Nemundo\Core\File\Path;
use Nemundo\Project\AbstractProject;

class FrameworkProject extends AbstractProject
{

    protected function loadProject()
    {

        $this->project = 'Framework';
        $this->projectName = 'framework';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        /*$this->dbFilename = (new Path())
            ->addPath(__DIR__)
            ->addPath('..')
            ->addPath('db')
            ->addPath('framework.db')
            ->getFilename();*/

        $this->modelPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;






    }

}