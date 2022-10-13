<?php

namespace Nemundo\App\Dataset\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Dataset\Data\DatasetModelCollection;
use Nemundo\App\Dataset\Install\DatasetInstall;
use Nemundo\App\Dataset\Install\DatasetUninstall;
use Nemundo\App\Dataset\Site\DatasetSite;

class DatasetApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Dataset';
        $this->applicationId = 'efd5af2d-5bef-4e7f-9cfa-87b55f4a9f2b';
        $this->modelCollectionClass = DatasetModelCollection::class;
        $this->installClass = DatasetInstall::class;
        $this->uninstallClass = DatasetUninstall::class;
        $this->appSiteClass = DatasetSite::class;

    }
}