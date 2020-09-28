<?php

namespace Nemundo\Model\Item\DateTime;


use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Model\Item\AbstractModelItem;

class TimeModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $time = new Time($this->getValue());
        $this->addContent($time->getIsoTime());
        return parent::getContent();

    }


}