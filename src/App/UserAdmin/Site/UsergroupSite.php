<?php

namespace Nemundo\App\UserAdmin\Site;

use Nemundo\App\UserAdmin\Page\UsergroupPage;
use Nemundo\Web\Site\AbstractSite;

class UsergroupSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Usergroup';
        $this->url = 'usergroup';
    }

    public function loadContent()
    {
        (new UsergroupPage())->render();
    }
}