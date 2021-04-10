<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Navbar\AdminSiteNavbar;
use Nemundo\App\Manifest\Com\WebManifestJavaScript;
use Nemundo\App\Manifest\Com\WebManifestLink;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\Container;
use Nemundo\Html\Container\HtmlContainer;
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\Container\BootstrapContainer;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Container\JqueryHeader;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Package\OpenGraph\OpenGraph;
use Nemundo\Package\TwitterCard\TwitterCard;
use Nemundo\Web\WebConfig;

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

        $this->addPackage(new NemundoJsPackage());
        $this->addPackage(new JqueryPackage());
        $this->addPackage(new FontAwesomePackage());

        $this->addJavaScript('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');


        $this->navbar = new AdminSiteNavbar();
        $this->navbar->site = AdminConfig::$webController;
        $this->navbar->userMode = AdminConfig::$userMode;

        $this->navbar->showPasswordChange = AdminConfig::$showPasswordChange;

        if (AdminConfig::$logoUrl !== null) {
            $this->navbar->logoUrl = AdminConfig::$logoUrl;
        } else {
            $this->navbar->brand = LibraryHeader::$documentTitle;
        }

        parent::addContainer($this->navbar);

        $this->container = new BootstrapContainer();
        $this->container->fullWidth = true;
        parent::addContainer($this->container);

        //parent::loadContainer();

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->container->addContainer($container);
    }


    public function getContent()
    {

        new JqueryHeader($this);

        LibraryHeader::addHeaderContainer(new OpenGraph());
        LibraryHeader::addHeaderContainer(new TwitterCard());


        //LibraryHeader::addJsUrl(WebConfig::$webUrl.'js/serviceworker.js');

        /*
        LibraryHeader::addHeaderContainer(new WebManifestLink());
        LibraryHeader::addHeaderContainer(new WebManifestJavaScript());*/




        $container = new HtmlContainer();
        $container->addContent('
<link rel="manifest" href="/manifest.webmanifest" />
<script type="text/javascript">
if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("/js/serviceworker.js");
}
</script>

');

        /*
         *
         *
         */


        /*new WebManifestLink($container);
        new WebManifestJavaScript($container);*/
        LibraryHeader::addHeaderContainer($container);





        //$this->addJsUrl('js/serviceworker.js');



        return parent::getContent();

    }

}