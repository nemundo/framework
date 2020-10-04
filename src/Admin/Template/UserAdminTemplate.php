<?php

namespace Nemundo\Admin\Template;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\OpenGraph\OpenGraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Language\Translation;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Layout\Footer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Web\WebConfig;



class UserAdminTemplate extends AdminTemplate  // BootstrapDocument
{

    /**
     * @var BootstrapContainer
     */
    private $container;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->navbar->userMode=false;

        /*
        $navbar = new BootstrapSiteNavbar();
        $navbar->userMode=true;
        parent::addContainer($navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;
        parent::addContainer($this->container);*/

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }

}