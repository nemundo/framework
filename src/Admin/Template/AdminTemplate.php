<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Web\Site\BaseUrlSite;

class AdminTemplate extends BootstrapDocument
{

    /**
     * @var BootstrapContainer
     */
    private $container;

    /**
     * @var BootstrapSiteNavbar
     */
    protected $navbar;


    //protected $navbar;


    /*
    public static function loadTemplate()
    {

        if ($this->navbar == null) {
            $this->navbar = new BootstrapSiteNavbar();
        }

    }*/


    protected function loadContainer()
    {

        $this->navbar = new BootstrapSiteNavbar();
        $this->navbar->site = AdminConfig::$webController;
        $this->navbar->userMode = false;
        if (AdminConfig::$logoUrl !== null) {
            $logo = new BootstrapNavbarLogo($this->navbar);
            $logo->logoSite = new BaseUrlSite();
            $logo->logoUrl = AdminConfig::$logoUrl;
        }


        /*
        $this->navbar->addUserMenuDivider();
        $this->navbar->addUserMenuDivider();
        $this->navbar->addUserMenuSite(LogoutSite::$site);
        $this->navbar->addUserMenuDivider();
        $this->navbar->addUserMenuDivider();
*/

        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;
        parent::addContainer($this->container);

        parent::loadContainer();

        $this->title = AdminConfig::$adminTitle;

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }


    public function getContent()
    {

        if ($this->title == null) {
            $this->title = AdminConfig::$adminTitle;
        }

        new JqueryHeader($this);

        return parent::getContent();

    }

}