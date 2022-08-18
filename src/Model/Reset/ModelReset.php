<?php

namespace Nemundo\Model\Reset;

use Nemundo\Core\File\File;
use Nemundo\Model\Path\SetupLogPath;
use Nemundo\Project\Reset\AbstractReset;

class ModelReset extends AbstractReset
{

    public function reset()
    {

        $file = (new File((new SetupLogPath())->getFilename()));
        if ($file->fileExists()) {
            $file->deleteFile();
        }

    }


    public function remove()
    {

    }

}