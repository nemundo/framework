<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;

class AppTextTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var NumberOrmType
     */
    public $length;

    protected function loadModel()
    {

        $this->tableName = 'app_model_text';
        $this->className = 'AppTextType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppTextType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->length = new NumberOrmType($this);
        $this->length->fieldName = 'length';
        $this->length->variableName = 'length';

    }

}