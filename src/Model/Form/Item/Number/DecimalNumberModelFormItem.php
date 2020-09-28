<?php

namespace Nemundo\Model\Form\Item\Number;

use Nemundo\Core\Type\Text\Text;
use Nemundo\Model\Form\Item\Text\TextModelFormItem;

class DecimalNumberModelFormItem extends TextModelFormItem
{

    public function saveValue()
    {

        $value = $this->textBox->getValue();
        $value = (new Text($value))->replace(',', '.')->getValue();
        $this->typeValueList->setModelValue($this->type, $value);

    }

}