<?php

namespace Nemundo\App\Scheduler\Builder;

use Nemundo\App\Scheduler\Data\Job\Job;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\Core\Base\AbstractBase;

class JobBuilder extends AbstractBase
{

    public function buildJob($scriptId) {

        $data = new Job();
        $data->scriptId = $scriptId;
        $data->finished = false;
        $data->statusId = (new PlannedSchedulerStatus())->id;
        $data->save();

        return $this;

    }


}