<?php

namespace Nemundo\App\Dataset\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\Dataset\Data\DatasetModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class DatasetUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new DatasetModelCollection());

    }
}