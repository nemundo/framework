<?php

namespace Nemundo\Admin\Com\ListGroup;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;

class AdminListGroupSiteHyperlink extends SiteHyperlink
{

    public function getContent()
    {
        $this->addCssClass('admin-listgroup-item');
        return parent::getContent();
    }

}