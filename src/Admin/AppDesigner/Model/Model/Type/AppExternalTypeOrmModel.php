<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppModelOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\YesNoOrmType;

class AppExternalTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var ExternalOrmType
     */
    public $externalModel;

    /**
     * @var YesNoOrmType
     */
    public $appLoadModel;

    protected function loadModel()
    {

        $this->tableName = 'app_model_external';
        $this->className = 'AppExternalType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppExternalType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->externalModel = new ExternalOrmType($this);
        $this->externalModel->externalModelClassName = AppModelOrmModel::class;
        $this->externalModel->fieldName = 'external_field';
        $this->externalModel->variableName = 'externalModel';

        $this->appLoadModel = new YesNoOrmType($this);
        $this->appLoadModel->fieldName = 'load_model';
        $this->appLoadModel->variableName = 'appLoadModel';

    }

}