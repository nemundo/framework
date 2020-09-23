<?php

namespace Nemundo\Model\Item\Web;


use Nemundo\Com\Html\Hyperlink\EmailHyperlink;
use Nemundo\Model\Item\AbstractModelItem;

class EmailModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $value = $this->getValue();

        if ($value !== null) {
            $hyperlink = new EmailHyperlink($this);
            $hyperlink->email = $this->getValue();
        }

        return parent::getContent();

    }

}