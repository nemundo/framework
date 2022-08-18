<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;

class AdminItemHyperlinkContainer extends SiteHyperlink
{

    public function getContent()
    {

        $this->addCssClass('admin-item-container');
        $this->addCssClass('admin-hover');
        $this->showSiteTitle = false;
        return parent::getContent();


    }

}