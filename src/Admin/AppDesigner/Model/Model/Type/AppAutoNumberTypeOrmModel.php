<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;


class AppAutoNumberTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var NumberOrmType
     */
    public $startNumber;

    protected function loadModel()
    {

        $this->tableName = 'app_model_auto_number';
        $this->className = 'AppAutoNumberType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppAutoNumberType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->startNumber = new NumberOrmType($this);
        $this->startNumber->fieldName = 'start_number';
        $this->startNumber->variableName = 'startNumber';

    }

}