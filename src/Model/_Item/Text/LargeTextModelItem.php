<?php

namespace Nemundo\Model\Item\Text;


use Nemundo\Model\Item\AbstractModelItem;

class LargeTextModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $this->addContent(nl2br($this->getValue()));

        return parent::getContent();
    }

}