<?php

namespace Nemundo\Dev\Job;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\File\Directory;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\ProjectConfig;

class DeleteTmpScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        //$this->consoleScript = true;

        $this->scriptName = 'tmp-delete';

    }


    public function run()
    {

        //$directory = new Directory(ProjectConfig::$tmpPath . DIRECTORY_SEPARATOR);
        //$directory->deleteDirectory(false);

        (new TmpPath())
            ->emptyDirectory();

    }


}