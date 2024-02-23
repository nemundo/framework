<?php

namespace Nemundo\App\UserAdmin\Site\Action;

use Nemundo\Admin\Site\AbstractActiveIconSite;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Parameter\UserParameter;

class EnableUserSite extends AbstractActiveIconSite
{

    /**
     * @var EnableUserSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'user-active';
        $this->title = 'User Enable';

        EnableUserSite::$site = $this;

    }

    public function loadContent()
    {

        $userId = (new UserParameter())->getValue();
        (new UserBuilder($userId))->enableUser();
        (new UrlReferer())->redirect();

    }

}