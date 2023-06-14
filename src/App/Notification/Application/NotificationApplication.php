<?php

namespace Nemundo\App\Notification\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Notification\Data\NotificationModelCollection;
use Nemundo\App\Notification\Install\NotificationInstall;
use Nemundo\App\Notification\Install\NotificationUninstall;
use Nemundo\App\Notification\Site\NotificationSite;

class NotificationApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Notification';
        $this->applicationId = '04961e78-4817-4f03-aa24-82c43d6cacfd';
        $this->modelCollectionClass = NotificationModelCollection::class;
        $this->installClass = NotificationInstall::class;
        $this->uninstallClass = NotificationUninstall::class;
        $this->appSiteClass = NotificationSite::class;
    }
}