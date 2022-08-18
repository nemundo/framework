<?php

namespace Nemundo\App\Scheduler\Reader;

use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;

class SchedulerDataReader extends SchedulerReader
{

    public $applicationId;

    public function getData()
    {

        $this->model->loadScript();
        $this->model->script->loadApplication();

        if ($this->applicationId !== null) {
            $this->filter->andEqual($this->model->script->applicationId, $this->applicationId);
        }

        return parent::getData();

    }

}