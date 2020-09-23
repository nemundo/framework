<?php

namespace Nemundo\App\WebLog\Install;

use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\App\WebLog\Data\WebLogCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class WebLogInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WebLogCollection());

    }
}