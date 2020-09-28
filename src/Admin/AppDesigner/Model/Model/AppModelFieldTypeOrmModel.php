<?php

namespace Nemundo\Admin\AppDesigner\Model\Model;


use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppModelFieldTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var TextOrmType
     */
    public $fieldType;

    /**
     * @var TextOrmType
     */
    public $fieldClassName;

    protected function loadModel()
    {

        $this->label = 'Field Type';
        $this->tableName = 'app_model_field_type';
        $this->className = 'AppModelFieldType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelFieldType';
        $this->primaryIndex = new TextIdPrimaryIndex();

        $this->fieldType = new TextOrmType($this);
        $this->fieldType->fieldName = 'field_type';
        $this->fieldType->variableName='fieldType';

        $this->fieldClassName = new TextOrmType($this);
        $this->fieldClassName->fieldName = 'field_class_name';
        $this->fieldClassName->variableName = 'fieldClassName';

        //$index = new ModelUniqueIndex($this);
        //$index->addType($this->fieldClassName);

        $this->addDefaultType($this->fieldType);
        $this->addDefaultOrderType($this->fieldType);

    }

}