<?php

namespace Nemundo\App\UserAction\Service;

use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Session\UserSession;

class PasswordChangeWebService extends AbstractWebService
{

    protected function loadService()
    {
        $this->serviceName = 'user-change-password';
    }


    public function onRequest()
    {

        $passwordNew = (new HttpRequest('password-new'))->getValue();

        $userType = new UserBuilder((new UserSession())->userId);
        $userType->changePassword($passwordNew);

        $this->sendOkStatus();

    }

}