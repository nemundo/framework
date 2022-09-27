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

            $this->addSite($this->site);
            foreach ($this->site->getMenuActiveSite() as $site) {
                $this->addSite($site);
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

        return $this;

    }


}