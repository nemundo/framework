<?php

namespace Nemundo\App\Scheduler\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Scheduler\Data\SchedulerModelCollection;

class SchedulerApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Scheduler';
        $this->applicationId = 'b83a0976-d01a-4e70-9247-a721ca5e1fca';
        $this->modelCollectionClass = SchedulerModelCollection::class;

    }

}