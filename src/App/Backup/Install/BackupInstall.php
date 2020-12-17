<?php


namespace Nemundo\App\Backup\Install;


use Nemundo\App\Backup\Scheduler\BackupDumpScheduler;
use Nemundo\App\Backup\Script\DumpRestoreScript;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\AbstractInstall;

class BackupInstall extends AbstractInstall
{

    public function install()
    {

        (new SchedulerSetup())
            ->addScheduler(new BackupDumpScheduler());

        (new ScriptSetup())
            ->addScript(new DumpRestoreScript());

    }

}