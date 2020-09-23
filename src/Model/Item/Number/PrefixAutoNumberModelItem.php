<?php

namespace Nemundo\Model\Item\Number;


use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Type\Number\PrefixAutoNumberType;

class PrefixAutoNumberModelItem extends AbstractModelItem
{

    /**
     * @var PrefixAutoNumberType
     */
    public $type;


    public function getContent()
    {
        $this->addContent($this->row->getModelValue($this->type->prefixAutoNumber));
        return parent::getContent();
    }


}