<?php

namespace Nemundo\Model\Item\Web;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Type\Web\UrlType;

class UrlModelItem extends AbstractModelItem
{

    /**
     * @var UrlType
     */
    public $type;

    public function getContent()
    {

        $label = $this->getValue();

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $label;
        $hyperlink->url = $this->getValue();
        $hyperlink->openNewWindow = true;

        return parent::getContent();
    }

}