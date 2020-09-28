<?php

namespace Nemundo\Admin\Log\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Log\LogFileDelete;

class LogFileDeleteScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'log-file-delete';
    }


    public function run()
    {

        (new LogFileDelete())->deleteLog();

    }

}