<?php

namespace Nemundo\User\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\User\Application\UserApplication;

use Nemundo\User\Data\UserModelCollection;
use Nemundo\User\Script\AdminUser\AdminUserDelete;
use Nemundo\User\Script\AdminUser\AdminUserDisable;

use Nemundo\User\Script\AdminUserScript;
use Nemundo\User\Script\Password\UserPasswordReset;
use Nemundo\User\Script\UsergroupCleanScript;
use Nemundo\User\Test\UserTest;


class UserInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new UserApplication());

        (new ModelCollectionSetup())
        ->addCollection(new UserModelCollection());

        (new ScriptSetup())
            ->addScript(new AdminUserScript())
            ->addScript(new UsergroupCleanScript());



        /*
        $setup = new ScriptSetup();
        $setup->addScript(new AdminUserScript());
        $setup->addScript(new AdminUserDisable());
        $setup->addScript(new AdminUserDelete());
        $setup->addScript(new UserPasswordReset());
        $setup->addScript(new UserTest());
        $setup->addScript(new UserClean());*/

    }

}