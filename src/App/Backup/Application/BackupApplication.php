<?php

namespace Nemundo\App\Backup\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Backup\Data\BackupModelCollection;
use Nemundo\App\Backup\Install\BackupInstall;
use Nemundo\App\Backup\Install\BackupUninstall;
use Nemundo\App\Backup\Site\BackupSite;

class BackupApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Backup';
        $this->applicationId = '30f2e370-6fc4-4952-be5c-a5eb052bbf49';
        $this->modelCollectionClass = BackupModelCollection::class;
        $this->installClass = BackupInstall::class;
        $this->uninstallClass = BackupUninstall::class;
        $this->adminSiteClass = BackupSite::class;
    }
}