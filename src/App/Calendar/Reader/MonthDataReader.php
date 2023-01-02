<?php

namespace Nemundo\App\Calendar\Reader;

use Nemundo\App\Calendar\Data\Month\MonthReader;

class MonthDataReader extends MonthReader
{

    public function getData()
    {
        $this->addOrder($this->model->id);
        return parent::getData();
    }

}