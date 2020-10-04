<?php

namespace Nemundo\Admin\Com\Navbar;


use Nemundo\App\UserAction\Site\LogoutSite;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Web\WebConfig;

use Paranautik\App\UserConfig\Site\UserConfigSite;
use Paranautik\Controller\DesktopController;
use Paranautik\Site\Home\HomeSite;
use Paranautik\Site\Setting\SettingSite;

class AdminNavbar extends BootstrapSiteNavbar
{

    public function getContent()
    {

        $this->fixed = true;

        $logo = new BootstrapNavbarLogo($this);
        $logo->logoSite = HomeSite::$site;
        $logo->logoUrl = WebConfig::$webUrl . 'img/logo.png';

        $this->site = DesktopController::$controller;

        /*
        $this->addUserMenuSite(MyFlightSite::$site);
        $this->addUserMenuSite(SettingSite::$site);
        $this->addUserMenuDivider();*/


        $this->addUserMenuSite(UserConfigSite::$site);
        $this->addUserMenuDivider();
        $this->addUserMenuSite(PasswordChangeSite::$site);
        $this->addUserMenuSite(LogoutSite::$site);

        return parent::getContent();

    }

}