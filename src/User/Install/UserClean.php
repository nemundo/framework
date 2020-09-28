<?php

namespace Nemundo\User\Install;


use Nemundo\App\Script\Type\AbstractConsoleScript;

class UserClean extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'user-clean';
    }

    public function run()
    {

        (new UserUninstall())->run();
        (new UserInstall())->run();

    }

}