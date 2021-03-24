<?php

namespace Nemundo\Admin\Template;


// UserMode
// WithoutUser
class UserModeAdminTemplate extends AdminTemplate
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