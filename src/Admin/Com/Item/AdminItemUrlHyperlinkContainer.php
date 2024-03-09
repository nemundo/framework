<?php

namespace Nemundo\Admin\Com\Item;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

class AdminItemUrlHyperlinkContainer extends UrlHyperlink
{

    public function getContent()
    {


        $this->addCssClass('admin-item-container');
        $this->addCssClass('admin-item-hyperlink');
        $this->addCssClass('admin-item-container-hyperlink');
        $this->addCssClass('admin-hover');

        return parent::getContent();
    }

}