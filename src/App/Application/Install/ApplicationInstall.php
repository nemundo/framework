<?php

namespace Nemundo\App\Application\Install;

use Nemundo\App\Application\Application\ApplicationApplication;
use Nemundo\App\Application\Data\ApplicationCollection;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ApplicationInstall extends AbstractInstall
{

    public function install()
    {


        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ApplicationCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new ApplicationApplication());

    }

}