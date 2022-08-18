<?php

namespace Nemundo\App\UserAction\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Core\Type\Text\Text;
use Nemundo\User\Login\UserLogin;
use Nemundo\User\Session\UserSession;

class LoginServiceRequest extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'user-login';
        $this->restrictedService = false;
    }


    public function onRequest()
    {

        $returnValue = null;

        $login = new UserLogin();
        $login->login = (new HttpRequest('login'))->getValue();
        $login->password = (new HttpRequest('password'))->getValue();
        $value = $login->loginUser();

        $row = [];
        $row['success'] = $value;  // (new YesNo($value))->getText();
        $row['login'] = (new Text($login->login))->changeToLowercase()->getValue();

        $usergroupList = [];
        foreach ((new UserSession())->getUsergroupList() as $usergroupRow) {


            $usergroupList[] = $usergroupRow;


        }
        $row['usergroup'] = $usergroupList;

        $this->addRow($row);

    }

}