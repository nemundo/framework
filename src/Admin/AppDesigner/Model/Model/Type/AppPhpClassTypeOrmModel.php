<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppPhpClassTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var TextOrmType
     */
    public $phpClassName;

    protected function loadModel()
    {

        $this->tableName = 'app_model_php_class';
        $this->className = 'AppPhpClassType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppPhpClassType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->phpClassName = new TextOrmType($this);
        $this->phpClassName->fieldName = 'php_class_name';
        $this->phpClassName->variableName = 'phpClassName';

    }

}