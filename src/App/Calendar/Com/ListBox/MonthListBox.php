<?php

namespace Nemundo\App\Calendar\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\App\Calendar\Parameter\MonthParameter;
use Nemundo\App\Calendar\Reader\MonthDataReader;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Language\LanguageConfig;

class MonthListBox extends AdminListBox
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->name= (new MonthParameter())->getParameterName();
    }

    public function getContent()
    {

        $this->label[LanguageCode::EN] = 'Month';
        $this->label[LanguageCode::DE] = 'Monat';

        foreach ((new MonthDataReader())->getData() as $monthRow) {
            $this->addItem($monthRow->id,$monthRow->month);
        }

        return parent::getContent();
    }
}