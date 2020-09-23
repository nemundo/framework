<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\YesNoOrmType;

class AppExternalUserTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var YesNoOrmType
     */
    public $appLoadModel;

    protected function loadModel()
    {

        $this->tableName = 'app_model_external_user';
        $this->className = 'AppExternalUserType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppExternalUserType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->appLoadModel = new YesNoOrmType($this);
        $this->appLoadModel->fieldName = 'load_model';
        $this->appLoadModel->variableName = 'appLoadModel';

    }

}