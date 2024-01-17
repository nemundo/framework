<?php

namespace Nemundo\App\UserAction\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\UserAction\Service\LoginWebService;
use Nemundo\App\UserAction\Service\LogoutWebService;
use Nemundo\App\UserAction\Service\PasswordChangeWebService;
use Nemundo\App\UserAction\Service\PasswordForgotWebService;
use Nemundo\App\UserAction\Service\UserActivationWebService;
use Nemundo\App\UserAction\Service\UserBuilderWebService;
use Nemundo\App\UserAction\Service\UserCheckWebService;
use Nemundo\App\UserAction\Service\UsergroupListWebService;
use Nemundo\App\UserAction\Service\UserListWebService;
use Nemundo\App\WebService\Setup\WebServiceSetup;

class UserActionInstall extends AbstractInstall
{

    public function install()
    {

        (new WebServiceSetup())
            ->addService(new UserBuilderWebService())
            ->addService(new UserListWebService())
            ->addService(new UsergroupListWebService())
            ->addService(new LogoutWebService())
            ->addService(new LoginWebService())
            ->addService(new UserCheckWebService())
            ->addService(new PasswordForgotWebService())
            ->addService(new PasswordChangeWebService())
            ->addService(new UserActivationWebService());

    }

}