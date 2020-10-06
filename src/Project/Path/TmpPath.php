<?php

namespace Nemundo\Project\Path;

use Nemundo\Project\ProjectConfig;

class TmpPath extends ProjectPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('tmp');

    }

}