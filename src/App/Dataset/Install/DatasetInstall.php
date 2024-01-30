<?php

namespace Nemundo\App\Dataset\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Dataset\Data\DatasetModelCollection;
use Nemundo\App\Dataset\Usergroup\DatasetUsergroup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class DatasetInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new DatasetModelCollection());

        (new UsergroupSetup())
            ->addUsergroup(new DatasetUsergroup());

    }
}