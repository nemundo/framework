<?php

namespace Nemundo\Admin\Template;

use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Web\Controller\AbstractWebController;

class AdminTemplate extends BootstrapDocument
{

    /**
     * @var AbstractWebController
     */
    public static $webController;

    /**
     * @var string
     */
    public static $logoUrl;

    /**
     * @var string
     */
    public static $adminTitle = 'Admin';

    /**
     * @var string[]
     */
    public static $adminCssUrl = [];

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

        //if (AdminTemplate::$webController !== null) {

        $this->navbar = new BootstrapSiteNavbar();
        $this->navbar->site = \Nemundo\Admin\AdminConfig::$webController;  //  AdminTemplate::$webController;
        $this->navbar->userMode = false;

        /*if (AdminTemplate::$logoUrl !== null) {
            $logo = new BootstrapNavbarLogo($this->navbar);
            $logo->logoSite =new BaseUrlSite();
            $logo->logoUrl = AdminTemplate::$logoUrl;
        }*/

        parent::addContainer($this->navbar);

        //}

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

        $this->title = AdminTemplate::$adminTitle;

        foreach (AdminTemplate::$adminCssUrl as $url) {
            $this->addCssUrl($url);
        }

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new JqueryUiPackage());

        new JqueryHeader($this);

        return parent::getContent();

    }

}