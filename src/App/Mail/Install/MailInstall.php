<?php

namespace Nemundo\App\Mail\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Mail\Data\MailCollection;
use Nemundo\App\Mail\Script\MailQueueDeleteScript;
use Nemundo\App\Mail\Scheduler\MailQueueScheduler;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class MailInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new MailApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new MailCollection());

        $setup = new ScriptSetup();
        $setup->application = new MailApplication();
        $setup->addScript(new MailClean());
        $setup->addScript(new MailQueueDeleteScript());

        (new SchedulerSetup(new MailApplication()))
            ->addScheduler(new MailQueueScheduler());

    }

}