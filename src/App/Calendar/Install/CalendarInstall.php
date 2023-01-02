<?php

namespace Nemundo\App\Calendar\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Calendar\Data\CalendarModelCollection;
use Nemundo\App\Calendar\Data\Month\Month;
use Nemundo\Core\Date\Month\MonthReader;
use Nemundo\Model\Setup\ModelCollectionSetup;

class CalendarInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new CalendarModelCollection());

        foreach ((new MonthReader())->getData() as $monthItem) {

            $data = new Month();
            $data->ignoreIfExists = true;
            $data->id = $monthItem->monthNumber;
            $data->month = $monthItem->month;
            $data->save();

        }

    }
}