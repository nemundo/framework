<?php

namespace Nemundo\App\Backup\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\Backup\Data\BackupModelCollection;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Scheduler\BackupDumpScheduler;
use Nemundo\App\Backup\Scheduler\SqlDumpScheduler;
use Nemundo\App\Backup\Script\BackupCleanScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class BackupInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new BackupModelCollection());

        (new SchedulerSetup(new BackupApplication()))
            ->addScheduler(new BackupDumpScheduler())
            ->addScheduler(new SqlDumpScheduler());

        (new ScriptSetup(new BackupApplication()))
            ->addScript(new BackupCleanScript());

        (new BackupPath())->createPath();


    }
}