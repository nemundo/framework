<?php

namespace Nemundo\App\UserAction\Service;

use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\User\Session\UserSession;

class UserCheckWebService extends AbstractWebService
{

    protected function loadService()
    {
        $this->serviceName = 'user-check';
        $this->restrictedService = false;
    }


    public function onRequest()
    {

        $isLogged = false;
        $login = '';
        $displayName = '';
        $usergroup = [];

        $userInformation = new UserSession();
        if ($userInformation->isUserLogged()) {

            $isLogged = true;
            $login = $userInformation->login;
            $displayName = $userInformation->displayName;

            $usergroup = $userInformation->getUsergroupList();

        }

        $row = [];
        $row['is_logged'] = $isLogged;
        $row['login'] = $login;
        $row['display_name'] = $displayName;
        $row['usergroup'] = $usergroup;
        $this->addRow($row);

    }

}