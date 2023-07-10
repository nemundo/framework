<?php

namespace Nemundo\App\Backup\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\Backup\Data\BackupModelCollection;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Path\ExportBackupPath;
use Nemundo\App\Backup\Path\ImportBackupPath;
use Nemundo\App\Backup\Scheduler\BackupExportScheduler;
use Nemundo\App\Backup\Scheduler\SqlDumpScheduler;
use Nemundo\App\Backup\Script\BackupCleanScript;
use Nemundo\App\Backup\Script\BackupImportScript;
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
            ->addScheduler(new BackupExportScheduler())
            ->addScheduler(new SqlDumpScheduler());

        (new ScriptSetup(new BackupApplication()))
            ->addScript(new BackupImportScript())
            ->addScript(new BackupCleanScript());

        (new BackupPath())->createPath();
        (new ImportBackupPath())->createPath();
        (new ExportBackupPath())->createPath();


    }
}