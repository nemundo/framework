<?php


namespace Nemundo\App\Scheduler\Check;


use Nemundo\App\Scheduler\Data\Job\JobPaginationReader;
use Nemundo\App\Scheduler\Data\Job\JobUpdate;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Time\Stopwatch;

class JobCheck extends AbstractBase
{

    public function checkJob()
    {


        $jobReader = new JobPaginationReader();
        $jobReader->model->loadScript();
        $jobReader->filter->andEqual($jobReader->model->finished, false);
        foreach ($jobReader->getData() as $jobRow) {

            $time = new Stopwatch();

            $script = $jobRow->script->getScript();
            $script->run();

            $update = new JobUpdate();
            $update->finished = true;
            $update->duration = $time->stop();
            $update->updateById($jobRow->id);

        }


    }

}