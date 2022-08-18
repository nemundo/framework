<?php

namespace Nemundo\App\UserAction\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\UserAction\Service\LoginServiceRequest;
use Nemundo\App\UserAction\Service\LogoutServiceRequest;
use Nemundo\App\UserAction\Service\PasswordChangeService;
use Nemundo\App\UserAction\Service\PasswordForgotService;
use Nemundo\App\UserAction\Service\UserActivationService;
use Nemundo\App\UserAction\Service\UserBuilderServiceRequest;
use Nemundo\App\UserAction\Service\UserCheckServiceRequest;
use Nemundo\App\UserAction\Service\UsergroupListServiceRequest;
use Nemundo\App\UserAction\Service\UserListServiceRequest;
use Nemundo\App\WebService\Setup\ServiceRequestSetup;

class UserActionInstall extends AbstractInstall
{

    public function install()
    {

        (new ServiceRequestSetup())
            ->addService(new UserBuilderServiceRequest())
            ->addService(new UserListServiceRequest())
            ->addService(new UsergroupListServiceRequest())
            ->addService(new LogoutServiceRequest())
            ->addService(new LoginServiceRequest())
            ->addService(new UserCheckServiceRequest())
            ->addService(new PasswordForgotService())
            ->addService(new PasswordChangeService())
            ->addService(new UserActivationService());

    }

}