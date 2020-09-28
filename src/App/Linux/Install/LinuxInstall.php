<?php


namespace Nemundo\App\Linux\Install;


use Nemundo\App\Linux\Script\LinuxIntallationScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\AbstractInstall;

class LinuxInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptSetup())
            ->addScript(new LinuxIntallationScript());


    }

}