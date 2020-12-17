<?php


namespace Nemundo\App\Backup\Path;


use Nemundo\Project\Path\ProjectPath;

class RestorePath extends ProjectPath
{

    protected function loadPath()
    {

        parent::loadPath();

        $this
            ->addPath('backup')
            ->addPath('restore');

    }

}