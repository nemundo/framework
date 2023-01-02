<?php

namespace Nemundo\App\Calendar\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\App\Calendar\Reader\MonthDataReader;

class MonthListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Month';

        foreach ((new MonthDataReader())->getData() as $monthRow) {
            $this->addItem($monthRow->id,$monthRow->month);
        }

        return parent::getContent();
    }
}