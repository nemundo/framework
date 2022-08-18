<?php

namespace Nemundo\Admin\Com\Tabs;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;

class AdminSiteTabs extends Div
{

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var AbstractUrlParameter
     */
    public $parameter;


    public function getContent()
    {

        $this->addCssClass('admin-tabs-button-container');

        if ($this->site !== null) {

            /*$baseSite = clone($this->site);
            if ($this->parameter !== null) {
                $baseSite->addParameter($this->parameter);
            }*/
            //$this->addSite($baseSite);

            $this->addSite($this->site);

            foreach ($this->site->getMenuActiveSite() as $site) {

                $this->addSite($site);


                /*
                $siteNew = clone($site);


                if ($this->parameter !== null) {
                    $siteNew->addParameter($this->parameter);
                }

                if ($siteNew->hasMenuActiveItems()) {

                    $li = new BootstrapSiteTabsDropdown($this);
                    $li->site = $siteNew;

                } else {

                    $this->addSite($siteNew);

                }*/

            }

        }

        return parent::getContent();

    }


    public function addSite(AbstractSite $site)
    {

        $btn = new SiteHyperlink($this);
        $btn->addCssClass('admin-tabs-button');
        $btn->site = $site;

        if ($site->isCurrentSite()) {
            $btn->addCssClass('admin-tabs-button-active');
        } else {
            $btn->addCssClass('admin-tabs-button-inactive');
        }


    }


}