<?php

namespace Nemundo\Admin\Com\ListGroup;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Inline\Span;
use Nemundo\Web\Site\AbstractSite;

class AdminListGroup extends Div
{

    public function getContent()
    {

        $this->addCssClass('admin-list-group');
        return parent::getContent();

    }


    public function addSite(AbstractSite $site)
    {

        $hyperlink = new AdminListGroupSiteHyperlink($this);
        $hyperlink->site = $site;

        return $this;

    }


    public function addActiveText($text)
    {

        $span = new Span($this);
        $span->content = $text;

        return $this;

    }


    public function addHyperlink($label, $url = '#')
    {

        /*$li = new Li($this);
        $li->addCssClass('list-group-item');*/

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->addCssClass('admin-listgroup-item');
        $hyperlink->content = $label;
        $hyperlink->url = $url;

        return $this;
    }

}