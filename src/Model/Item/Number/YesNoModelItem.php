<?php

namespace Nemundo\Model\Item\Number;


use Nemundo\Com\Item\YesNoItem;
use Nemundo\Model\Item\AbstractModelItem;

class YesNoModelItem extends AbstractModelItem
{


    public function getContent()
    {

        $value = $this->getValue();

        $item = new YesNoItem($this);
        $item->value = $value;

        return parent::getContent();
    }


}