<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

class AdminItemUrlHyperlink extends UrlHyperlink
{

    public function getContent()
    {

        $this->addCssClass('admin-item-hyperlink');

        return parent::getContent();
    }

}