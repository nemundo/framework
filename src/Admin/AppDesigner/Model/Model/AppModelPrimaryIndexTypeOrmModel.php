<?php

namespace Nemundo\Admin\AppDesigner\Model\Model;


use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppModelPrimaryIndexTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var TextOrmType
     */
    public $indexType;

    protected function loadModel()
    {

        $this->label = 'Primary Index Type';
        $this->tableName = 'app_model_primary_index_type';
        $this->className = 'AppModelPrimaryIndexType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType';
        $this->primaryIndex = new TextIdPrimaryIndex();

        $this->indexType = new TextOrmType($this);
        $this->indexType->fieldName = 'index_type';
        $this->indexType->variableName = 'indexType';

        $this->addDefaultType($this->indexType);
        $this->addDefaultOrderType($this->indexType);

    }
}