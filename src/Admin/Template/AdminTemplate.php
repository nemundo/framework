<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
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

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->title = AdminConfig::$adminTitle;

        $this->navbar = new BootstrapSiteNavbar();
        $this->navbar->site = \Nemundo\Admin\AdminConfig::$webController;
        $this->navbar->userMode = false;
        if (AdminConfig::$logoUrl !== null) {
            $logo = new BootstrapNavbarLogo($this->navbar);
            $logo->logoSite = new BaseUrlSite();
            $logo->logoUrl = AdminConfig::$logoUrl;
        }
        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;
        parent::addContainer($this->container);

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

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new JqueryUiPackage());

        new JqueryHeader($this);

        return parent::getContent();

    }

}