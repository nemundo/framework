<?php

namespace Nemundo\App\UserAdmin\Com\Tab;

use Nemundo\Admin\Com\Tab\AdminTab;
use Nemundo\App\UserAdmin\Site\UserAdminSite;

class UserAdminTab extends AdminTab
{

    public function getContent()
    {

        $this->site = UserAdminSite::$site;
        return parent::getContent();

    }

}