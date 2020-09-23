<?php

namespace Nemundo\Project\Install;


use Nemundo\Admin\Log\Script\LogFileDeleteScript;
use Nemundo\App\Application\Install\ApplicationInstall;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\DbAdmin\Install\DbAdminInstall;
use Nemundo\App\Mail\Install\MailInstall;
use Nemundo\App\Scheduler\Install\SchedulerInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Install\ScriptInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\File\Directory;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabase;
use Nemundo\Dev\Job\DeleteTmpScript;
use Nemundo\Project\Config\ProjectConfigBuilderScript;
use Nemundo\Project\Path\LogPath;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\ProjectConfig;
use Nemundo\User\Install\UserInstall;
use Nemundo\User\Setup\UsergroupSetup;


class ProjectInstall extends AbstractInstall
{


    public function install()
    {

        (new ProjectConfigBuilderScript())->run();
        (new MySqlDatabase())->createDatabase();

        // Ausführen vor Setup Status Reset !!!
        (new ApplicationInstall())->install();
        (new ScriptInstall())->install();
        (new UserInstall())->install();
        (new SchedulerInstall())->install();

        $this->resetSetupStatus();

        (new ApplicationInstall())->install();
        (new ScriptInstall())->install();
        (new SchedulerInstall())->install();
        (new UserInstall())->install();
        //(new SystemLogInstall())->run();
        //(new WebLogInstall())->run();
        (new MailInstall())->run();
        (new DbAdminInstall())->run();


        (new TmpPath())->createPath();
        (new LogPath())->createPath();

        /*
        $directory = new Directory();
        $directory->path = ProjectConfig::$tmpPath;
        $directory->createDirectory();

        $directory = new Directory();
        $directory->path = LogConfig::$logPath;
        $directory->createDirectory();*/


        $scriptSetup = new ScriptSetup();
        //$scriptSetup->addScript(new MySqlDumpBackup());
        $scriptSetup->addScript(new DeleteTmpScript());
        $scriptSetup->addScript(new LogFileDeleteScript());

        // $setup = new UsergroupSetup();
        // $setup->addUsergroup(new SystemAdministratorUsergroup());

    }


    public function resetSetupStatus()
    {

        (new ScriptSetup())->resetSetupStatus();
        (new UsergroupSetup())->resetSetupStatus();
        (new ApplicationSetup())->resetSetupStatus();
        (new SchedulerSetup())->resetSetupStatus();

    }


    public function removeUnused()
    {

        (new ScriptSetup())->removeUnusedScript();
        (new UsergroupSetup())->removeUnusedUsergroup();
        (new ApplicationSetup())->removeUnusedApplication();
        (new SchedulerSetup())->removeUnusedScheduler();

    }

}