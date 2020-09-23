<?php

namespace Nemundo\App\Scheduler\Script;

use Nemundo\App\Scheduler\Data\SchedulerCollection;
use Nemundo\App\Scheduler\Install\SchedulerInstall;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelCollectionSetup;


class SchedulerCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'scheduler-clean';
    }


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new SchedulerCollection());

        (new SchedulerInstall())->install();

    }

}