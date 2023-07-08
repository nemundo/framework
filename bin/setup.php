<?php

use Nemundo\App\ModelDesigner\Application\ModelDesignerApplication;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\User\Script\AdminUserScript;

require  "config.php";

$reset = new ProjectReset();
$reset->addReset(new \Nemundo\App\Dataset\Reset\DatasetReset());
$reset->reset();
(new ProjectInstall())->install();
(new ScriptSetup())->addScript(new AdminUserScript());

(new ModelDesignerApplication())->installApp();

(new \Nemundo\App\Dataset\Application\DatasetApplication())->installApp();
(new \Nemundo\App\Git\Application\GitApplication())->installApp();
(new \Nemundo\App\SystemLog\Application\SystemLogApplication())->installApp();
(new \Nemundo\App\Notification\Application\NotificationApplication())->installApp();
(new \Nemundo\App\Tmp\Application\TmpApplication())->installApp();
(new \Nemundo\App\Backup\Application\BackupApplication())->installApp();

$reset->remove();
