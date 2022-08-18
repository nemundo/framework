<?php


namespace Nemundo\App\UserAction\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\User\Login\UserLogout;

class LogoutServiceRequest extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'user-logout';
    }


    public function onRequest()
    {

        (new UserLogout())->logout();
        $this->sendOkStatus();

    }

}