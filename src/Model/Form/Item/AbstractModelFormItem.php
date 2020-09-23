<?php

namespace Nemundo\Model\Form\Item;

use Nemundo\Db\Connection\AbstractConnection;
use Nemundo\Html\Form\AbstractFormItem;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Row\ModelDataRow;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractModelFormItem extends AbstractFormItem
{

    /**
     * @var AbstractConnection
     */
    public $connection;

    /**
     * @var AbstractModelType
     */
    public $type;

    /**
     * @var ModelTypeValueList
     */
    public $typeValueList;

    /**
     * @var ModelDataRow
     */
    public $row;

    /**
     * @var bool
     */
    public $focus = false;

    /**
     * @var string
     */
    public $value;

    abstract public function saveValue();

    /*
    public function afterSave($id)
    {

    }*/


    public function loadType(AbstractModelType $type)
    {
        $this->type = $type;
    }

}