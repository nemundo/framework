<?php

namespace Nemundo\App\Calendar\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Calendar\Data\CalendarModelCollection;
use Nemundo\App\Calendar\Install\CalendarInstall;
use Nemundo\App\Calendar\Install\CalendarUninstall;

class CalendarApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Calendar';
        $this->applicationId = '33a2e71d-faeb-44a1-8ca9-be83c8716d1f';
        $this->modelCollectionClass = CalendarModelCollection::class;
        $this->installClass = CalendarInstall::class;
        $this->uninstallClass = CalendarUninstall::class;
    }
}