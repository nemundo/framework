<?php

namespace Nemundo\Model\Item;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Model\Row\ModelDataRow;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\External\ExternalType;

abstract class AbstractModelItem extends AbstractHtmlContainer
{

    /**
     * @var AbstractModelType|ExternalType
     */
    public $type;

    /**
     * @var ModelDataRow
     */
    public $row;


    protected function getValue()
    {
        $value = $this->row->getModelValue($this->type);
        return $value;
    }

}