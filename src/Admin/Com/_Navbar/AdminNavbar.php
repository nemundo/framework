<?php

namespace Nemundo\Admin\Com\Navbar;


use Nemundo\App\UserAction\Site\LogoutSite;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Web\WebConfig;

class AdminNavbar extends BootstrapSiteNavbar
{

    public function getContent()
    {

        $this->fixed = true;

        $logo = new BootstrapNavbarLogo($this);
        //$logo->logoSite = HomeSite::$site;
        $logo->logoUrl = WebConfig::$webUrl . 'img/logo.png';


        $this->addUserMenuDivider();
        $this->addUserMenuSite(PasswordChangeSite::$site);
        $this->addUserMenuSite(LogoutSite::$site);

        return parent::getContent();

    }

}