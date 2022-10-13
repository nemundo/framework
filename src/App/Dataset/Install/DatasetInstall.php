<?php

namespace Nemundo\App\Dataset\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Dataset\Data\DatasetModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class DatasetInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new DatasetModelCollection());

    }
}