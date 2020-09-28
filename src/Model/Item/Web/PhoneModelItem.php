<?php

namespace Nemundo\Model\Item\Web;


use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;
use Nemundo\Model\Item\AbstractModelItem;

class PhoneModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $value = $this->getValue();
        if ($value !== '') {
            $hyperlink = new PhoneHyperlink($this);
            $hyperlink->phone = $value;
        }

        return parent::getContent();

    }

}