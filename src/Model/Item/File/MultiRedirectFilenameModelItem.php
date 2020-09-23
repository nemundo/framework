<?php

namespace Nemundo\Model\Item\File;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\MultiRedirectFilenameReaderProperty;


class MultiRedirectFilenameModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $list = new UnorderedList($this);
        $list->addCssClass('list-unstyled');

        $multiFileProperty = new MultiRedirectFilenameReaderProperty($this->row, $this->type);
        foreach ($multiFileProperty->getList() as $fileProperty) {
            $hyperlink = new UrlHyperlink($list);
            $hyperlink->content = $fileProperty->getFilename();
            $hyperlink->url = $fileProperty->getUrl();
        }

        return parent::getContent();

    }

}