<?php

namespace Nemundo\App\Scheduler\Reader\Job;

use Nemundo\App\Scheduler\Data\Job\JobReader;

class JobDataReader extends JobReader
{

    public $applicationId;

    public function __construct()
    {

        parent::__construct();

        $this->model->loadScript();
        $this->model->loadStatus();

    }


    public function getData()
    {

        if ($this->applicationId !== null) {
            $this->filter->andEqual($this->model->script->applicationId, $this->applicationId);
        }

        $this->addOrder($this->model->finished);
        $this->addOrder($this->model->id);

        return parent::getData();

    }

}