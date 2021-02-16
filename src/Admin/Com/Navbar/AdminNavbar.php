<?php

namespace Nemundo\Admin\Com\Navbar;


namespace Nemundo\Admin\Com\Navbar;


use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarLogo;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarSearchForm;
use Nemundo\Package\Bootstrap\Navbar\BootstrapNavbarToggler;
use Nemundo\Package\Bootstrap\Navbar\BootstrapSiteNavbar;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\BaseUrlSite;


class AdminNavbar extends BootstrapSiteNavbar
{

    public $logoUrl;

    /**
     * @var bool
     */
    public $searchMode = false;

    /**
     * @var AbstractSite
     */
    public $searchSite;


    public function getContent()
    {

        $logo = new BootstrapNavbarLogo();
        $logo->logoSite = new BaseUrlSite();
        $logo->logoUrl = $this->logoUrl;
        $this->containerDiv->addContainerAtFirst($logo);

        $toggler = new BootstrapNavbarToggler();
        $this->containerDiv->addContainerAtFirst($toggler);

        if ($this->searchMode) {

            $search = new BootstrapNavbarSearchForm($this);
            $search->site = $this->searchSite;
            $search->sourceSite = SearchJsonSite::$site;

        }

        return parent::getContent();

    }

}

