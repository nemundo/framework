<?php

namespace Nemundo\Model\Item\File;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\RedirectFileReaderProperty;
use Nemundo\Model\Type\File\RedirectFileType;

class RedirectFileModelItem extends AbstractModelItem
{

    /**
     * @var RedirectFileType
     */
    public $type;

    public function getContent()
    {

        $fileProperty = new RedirectFileReaderProperty($this->row, $this->type);

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $fileProperty->getFilename();
        $hyperlink->url = $fileProperty->getUrl();
        $hyperlink->openNewWindow = true;

        return parent::getContent();

    }

}