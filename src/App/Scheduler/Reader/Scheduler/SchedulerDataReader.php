<?php

namespace Nemundo\App\Scheduler\Reader\Scheduler;

use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;

class SchedulerDataReader extends SchedulerReader
{

    public $applicationId;


    public function __construct()
    {

        parent::__construct();
        $this->model->loadApplication();

    }

    public function getData()
    {

        //$this->model->loadScript();
        //$this->model->script->loadApplication();

        /*if ($this->applicationId !== null) {
            $this->filter->andEqual($this->model->applicationId, $this->applicationId);
        }*/

        return parent::getData();

    }

}