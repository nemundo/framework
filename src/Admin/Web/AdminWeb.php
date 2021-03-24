<?php

namespace Nemundo\Admin\Web;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Controller\AdminController;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\User\Login\CookieLogin;
use Nemundo\Web\Base\AbstractWeb;


class AdminWeb extends AbstractWeb
{

    public function loadWeb()
    {

        (new CookieLogin())->checkLogin();

        AdminConfig::$webController = new AdminController();
        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;
        AdminConfig::$userMode = true;
        AdminConfig::$webController->render();


    }

}