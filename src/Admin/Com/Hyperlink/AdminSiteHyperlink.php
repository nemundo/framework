<?php

namespace Nemundo\Admin\Com\Hyperlink;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;

class AdminSiteHyperlink extends SiteHyperlink
{

    public function getContent()
    {

        $this->addCssClass('admin-hyperlink');
        return parent::getContent();

    }

}