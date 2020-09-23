<?php

namespace Nemundo\User\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\User\Application\UserApplication;
use Nemundo\User\Data\UserCollection;
use Nemundo\User\Script\AdminUser\AdminUserDelete;
use Nemundo\User\Script\AdminUser\AdminUserDisable;
use Nemundo\User\Script\AdminUser\AdminUserEnable;
use Nemundo\User\Script\Password\UserPasswordReset;
use Nemundo\User\Test\UserTest;


class UserInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ApplicationSetup();
        $setup->addApplication(new UserApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new UserCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new AdminUserEnable());
        $setup->addScript(new AdminUserDisable());
        $setup->addScript(new AdminUserDelete());
        $setup->addScript(new UserPasswordReset());
        $setup->addScript(new UserTest());
        $setup->addScript(new UserClean());

    }

}