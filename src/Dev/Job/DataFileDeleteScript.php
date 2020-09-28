<?php

namespace Nemundo\Dev\Job;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\File\Directory;
use Nemundo\Model\ModelConfig;
use Nemundo\Model\Path\DataPath;
use Nemundo\Model\Path\RedirectDataPath;


class DataFileDeleteScript extends AbstractScript
{


    // 'data-clean'


    public function run()
    {

        (new DataPath())->deleteDirectory(false);
        (new RedirectDataPath())->deleteDirectory(false);


        //(new Directory(ModelConfig::$dataPath))->deleteDirectory(false);
        //(new Directory(ModelConfig::$redirectDataPath))->deleteDirectory(false);

    }

}