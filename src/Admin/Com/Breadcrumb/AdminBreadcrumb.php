<?php

namespace Nemundo\Admin\Com\Breadcrumb;

use Nemundo\Admin\Com\ListGroup\AdminListGroupSiteHyperlink;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Inline\Span;
use Nemundo\Html\Listing\Li;
use Nemundo\Web\Site\AbstractSite;

class AdminBreadcrumb extends UnorderedList
{

    public function getContent()
    {

        $this->addCssClass('admin-breadcrumb');
        return parent::getContent();

    }


    public function addActiveItem($label)
    {

        $span = new Span($this);
        $span->content = $label;

        return $this;

    }


    public function addSite(AbstractSite $site) {

        $hyperlink=new SiteHyperlink($this);
        $hyperlink->site=$site;

        return $this;

    }

}