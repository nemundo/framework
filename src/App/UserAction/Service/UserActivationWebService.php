<?php


namespace Nemundo\App\UserAction\Service;


use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\User\Builder\UserBuilder;

class UserActivationWebService extends AbstractWebService
{

    protected function loadService()
    {
        $this->serviceName = 'user-activation';
    }


    public function onRequest()
    {

        $password = (new HttpRequest('password'))->getValue();

        $user = (new UserBuilder())->fromSecureTokenParameter();
        $user->changePassword($password);
        $user->enableUser();

        $this->sendOkStatus();

    }

}