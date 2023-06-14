<?php

namespace Nemundo\App\SystemLog\Reader;

use Nemundo\App\SystemLog\Data\Log\LogReader;

class LogDataReader extends LogReader
{

    protected function loadSource()
    {

        $this->model->loadApplication();
        $this->model->loadLogType();

    }

}