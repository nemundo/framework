<?php

namespace Nemundo\User\Install;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Data\UserCollection;

class UserUninstall extends AbstractScript
{

    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new UserCollection());

    }

}