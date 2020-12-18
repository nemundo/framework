<?php

namespace Nemundo\App\Backup\Script;


use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Dump\MySqlDumpRestore;
use Nemundo\Dev\Deployment\DeploymentConfig;
use Nemundo\Dev\Deployment\StagingEnvironment;


class BackupCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'backup-clean';
    }


    public function run()
    {

        (new BackupPath())->deleteDirectory();

    }

}