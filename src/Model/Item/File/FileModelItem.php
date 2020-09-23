<?php

namespace Nemundo\Model\Item\File;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;

class FileModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $fileProperty = new FileReaderProperty($this->row, $this->type);

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $fileProperty->getFilename();
        $hyperlink->url = $fileProperty->getUrl();
        $hyperlink->openNewWindow = true;

        return parent::getContent();

    }

}