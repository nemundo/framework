<?php

namespace Nemundo\Model\Item\Number;


use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Type\Number\NumberType;

class NumberModelItem extends AbstractModelItem
{

    /**
     * @var NumberType
     */
    public $type;

    public function getContent()
    {

        $number = $this->getValue();

        //new Number()

        if ($this->type->showThousandSeperator) {
            if (is_numeric($number)) {
                $number = number_format($number, 0, '.', '\'');
            }
        }

        if ($this->type->measurementUnit !== null) {
            $number .= ' ' . $this->type->measurementUnit;
        }

        $this->addContent($number);

        return parent::getContent();
    }


}