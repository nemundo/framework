<?php

namespace Nemundo\Package\Bootstrap\Tabs;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;

use Nemundo\Html\Listing\AbstractLi;

use Nemundo\Web\Site\AbstractSite;

class BootstrapSiteTabsDropdown extends AbstractLi
{

    /**
     * @var AbstractSite
     */
    public $site;


    public function getContent()
    {

        $this->addCssClass('nav-item dropdown');

        $this->addCssClass('active');

        $hyperlink =new SiteHyperlink($this);
        $hyperlink->site = $this->site;
        $hyperlink->addCssClass('nav-link dropdown-toggle');
        $hyperlink->addAttribute('data-toggle', 'dropdown');
        $hyperlink->addAttribute('role', 'button');
        $hyperlink->addAttribute('aria-haspopup', 'true');
        $hyperlink->addAttribute('aria-expanded', 'false');
        //$hyperlink->content = $this->site->title;

        $div = new Div($this);
        $div->addCssClass('dropdown-menu');

        foreach ($this->site->getMenuActiveSite() as $subsite) {

            $hyperlink = new SiteHyperlink($div);  // new Hyperlink($div);
            $hyperlink->addCssClass('dropdown-item');
            $hyperlink->site = $subsite;
            //$hyperlink->content = $subsite->title;
            //$hyperlink->url = $subsite->getUrl();

        }

        return parent::getContent();

    }

}