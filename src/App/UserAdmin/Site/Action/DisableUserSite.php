<?php

namespace Nemundo\App\UserAdmin\Site\Action;

use Nemundo\Admin\Site\AbstractInactiveIconSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Parameter\UserParameter;

class DisableUserSite extends AbstractInactiveIconSite
{

    /**
     * @var DisableUserSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'user-inactive';
        $this->title = 'User Disable';

        DisableUserSite::$site = $this;

    }

    public function loadContent()
    {

        $userId = (new UserParameter())->getValue();
        (new UserBuilder($userId))->disableUser();
        (new UrlReferer())->redirect();

    }

}