<?php

namespace Nemundo\Model\Item\File;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty;
use Nemundo\Model\Type\File\RedirectFilenameType;

class RedirectFilenameModelItem extends AbstractModelItem
{

    /**
     * @var RedirectFilenameType
     */
    public $type;

    public function getContent()
    {

        //$id = $this->row->getModelValue($this->row->model->id);
        $fileProperty = new RedirectFilenameReaderProperty($this->row, $this->type);

        $link = new UrlHyperlink($this);
        $link->content = $fileProperty->getFilename();
        $link->url = $fileProperty->getUrl();

        return parent::getContent();

    }

}