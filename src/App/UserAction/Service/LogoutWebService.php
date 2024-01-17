<?php


namespace Nemundo\App\UserAction\Service;


use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\User\Login\UserLogout;

class LogoutWebService extends AbstractWebService
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