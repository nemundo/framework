<?php

namespace Nemundo\Admin\Template;


use Nemundo\App\UserAction\Site\LogoutSite;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Content\App\UserProfile\Site\MyUserProfileSite;

class UserAdminTemplate extends AdminTemplate
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->navbar->userMode = true;

        /*$this->navbar->addUserMenuSite(MyUserProfileSite::$site);
        $this->navbar->addUserMenuSite( PasswordChangeSite::$site);
        $this->navbar->addUserMenuDivider();
        $this->navbar->addUserMenuSite(LogoutSite::$site);*/


    }

}