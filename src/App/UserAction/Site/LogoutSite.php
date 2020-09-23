<?php

namespace Nemundo\App\UserAction\Site;

use Nemundo\User\Login\UserLogout;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlRedirect;
use Nemundo\Web\WebConfig;

class LogoutSite extends AbstractSite
{

    /**
     * @var LogoutSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Logout';
        $this->url = 'logout';
        //$this->restricted = true;
        $this->menuActive = false;
        LogoutSite::$site = $this;
    }


    public function loadContent()
    {

        (new UserLogout())->logout();
        (new UrlRedirect())->redirect(WebConfig::$webUrl);

    }

}