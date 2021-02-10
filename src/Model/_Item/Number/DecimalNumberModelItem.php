<?php

namespace Nemundo\Model\Item\Number;


use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Type\Number\DecimalNumberType;

class DecimalNumberModelItem extends AbstractModelItem
{

    /**
     * @var DecimalNumberType
     */
    public $type;

    public function getContent()
    {

        $number = $this->getValue();

        /*
        if ($this->type->showThousandSeperator) {
            $number = number_format($number, 0, '.', '\'');
        }*/

        if ($this->type->measurementUnit !== null) {
            $number .= ' ' . $this->type->measurementUnit;
        }

        $this->addContent($number);

        return parent::getContent();
    }


}