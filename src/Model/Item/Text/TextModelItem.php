<?php

namespace Nemundo\Model\Item\Text;


use Nemundo\Model\Item\AbstractModelItem;

class TextModelItem extends AbstractModelItem
{

    public function getContent()
    {
        $this->addContent($this->getValue());
        return parent::getContent();
    }

}