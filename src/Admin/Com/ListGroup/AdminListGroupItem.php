<?php

namespace Nemundo\Admin\Com\ListGroup;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Inline\Span;

class AdminListGroupItem extends Span
{

    public function getContent()
    {
        $this->addCssClass('admin-listgroup-item');
        return parent::getContent();
    }

}