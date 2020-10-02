<?php

namespace Nemundo\Project\Path;


class LogPath extends AbstractProjectPath  // ProjectPath
{

    protected function loadPath()
    {
        //parent::loadPath();
        $this->addPath('log');
    }

}