<?php

namespace Nemundo\Model\Item\DateTime;


use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Model\Item\AbstractModelItem;

class DateModelItem extends AbstractModelItem
{

    public function getContent()
    {

        $value = $this->row->getModelValue($this->type);

        if ($value !== '0000-00-00') {
            $date = new Date($value);
            $this->addContent($date->getShortDateLeadingZeroFormat());
        }

        return parent::getContent();
    }


}