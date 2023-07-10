<?php

namespace Nemundo\App\UserAdmin\Com\Tab;

use Nemundo\Admin\Com\Tabs\AdminSiteTabs;
use Nemundo\App\UserAdmin\Site\UserAdminSite;

class UserAdminTab extends AdminSiteTabs
{

    public function getContent()
    {

        $this->site = UserAdminSite::$site;
        return parent::getContent();

    }

}