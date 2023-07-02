<?php

namespace Nemundo\App\Tmp\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Tmp\Data\TmpModelCollection;
use Nemundo\App\Tmp\Install\TmpInstall;
use Nemundo\App\Tmp\Install\TmpUninstall;
use Nemundo\App\Tmp\Site\TmpSite;

class TmpApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Tmp';
        $this->applicationId = 'bd7857ec-c9e7-497a-9a3c-e09aec9e27f3';
        $this->modelCollectionClass = TmpModelCollection::class;
        $this->installClass = TmpInstall::class;
        $this->uninstallClass = TmpUninstall::class;
        $this->appSiteClass = TmpSite::class;
    }
}