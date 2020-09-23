<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Index;


use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppModelIndexTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var TextOrmType
     */
    public $indexType;

    /**
     * @var TextOrmType
     */
    public $indexTypeClassName;


    protected function loadModel()
    {

        $this->label = 'Index Type';
        $this->tableName = 'app_model_index_type';
        $this->className = 'AppModelIndexType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelIndexType';

        $this->primaryIndex = new TextIdPrimaryIndex();

        $this->indexType = new TextOrmType($this);
        $this->indexType->fieldName = 'index_type';
        $this->indexType->variableName = 'indexType';

        $this->indexTypeClassName = new TextOrmType($this);
        $this->indexTypeClassName->fieldName = 'index_type_class_name';
        $this->indexTypeClassName->variableName = 'indexTypeClassName';

        $index = new ModelUniqueIndex($this);
        $index->addType($this->indexTypeClassName);

        $this->addDefaultType($this->indexType);
        $this->addDefaultOrderType($this->indexType);

    }

}