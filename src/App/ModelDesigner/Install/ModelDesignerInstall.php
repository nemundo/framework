<?php

namespace Nemundo\App\ModelDesigner\Install;


use Nemundo\App\ModelDesigner\Script\JsonCleanScript;
use Nemundo\App\ModelDesigner\Script\ModelDesignerOrmScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;

class ModelDesignerInstall extends AbstractScript
{

    public function run()
    {

        $setup = new ScriptSetup();
        $setup->addScript(new JsonCleanScript());
        $setup->addScript(new ModelDesignerOrmScript());

    }

}