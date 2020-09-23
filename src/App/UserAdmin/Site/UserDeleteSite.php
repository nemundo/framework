<?php

namespace Nemundo\App\UserAdmin\Site;


use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\User\Parameter\UserParameter;
use Nemundo\User\Type\UserItemType;
use Nemundo\Web\Url\UrlReferer;

class UserDeleteSite extends AbstractIconSite
{

    /**
     * @var UserDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'delete';
        $this->icon = new DeleteIcon();
        $this->menuActive = false;

        UserDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        $user = new UserItemType((new UserParameter())->getValue());
        $user->deleteUser();

        (new UrlReferer())->redirect();

    }

}