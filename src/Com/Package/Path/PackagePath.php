<?php

namespace Nemundo\Com\Package\Path;

use Nemundo\Project\Path\ProjectPath;

class PackagePath extends ProjectPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('package');
    }

}