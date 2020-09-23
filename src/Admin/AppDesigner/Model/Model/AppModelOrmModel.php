<?php

namespace Nemundo\Admin\AppDesigner\Model\Model;

use Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelExternalType;
use Nemundo\Admin\AppDesigner\Model\App\AppOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;
use Nemundo\Model\Definition\Model\ModelTrait\ActiveModelTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\YesNoOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppModelOrmModel extends AbstractOrmModel
{

    use ActiveModelTrait;

    /**
     * @var YesNoOrmType
     */
    public $editable;

    /**
     * @var ExternalOrmType
     */
    public $app;

    /**
     * @var AppTemplateModelExternalType
     */
    public $templateModel;

    /**
     * @var TextOrmType
     */
    public $modelLabel;

    /**
     * @var TextOrmType
     */
    public $modelTableName;

    /**
     * @var TextOrmType
     */
    public $modelClassName;

    /**
     * @var TextOrmType
     */
    public $modelNamespace;

    /**
     * @var ExternalOrmType
     */
    public $modelPrimaryIndex;

    /**
     * @var YesNoOrmType
     */
    public $modelCreateAdminOrm;

    /**
     * @var TextOrmType
     */
    public $rowClassName;


    protected function loadModel()
    {

        $this->label = 'Model';
        $this->tableName = 'app_model';
        $this->className = 'AppModel';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModel';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->loadActiveModelTrait();

        $this->editable = new YesNoOrmType($this);
        $this->editable->fieldName = 'editable';
        $this->editable->variableName = 'editable';
        $this->editable->visible->form = false;

        $this->app = new ExternalOrmType($this);
        $this->app->externalModelClassName = AppOrmModel::class;
        $this->app->fieldName = 'app_designer_app';
        $this->app->variableName = 'app';

        $this->templateModel = new ExternalOrmType($this);
        $this->templateModel->externalModelClassName = AppTemplateModelOrmModel::class;
        $this->templateModel->fieldName = 'template';
        $this->templateModel->variableName = 'templateModel';
        $this->templateModel->loadModel = true;
        $this->templateModel->validation = true;

        $this->modelLabel = new TextOrmType($this);
        $this->modelLabel->label = 'Model Label';
        $this->modelLabel->fieldName = 'label';
        $this->modelLabel->variableName = 'modelLabel';
        $this->modelLabel->validation = true;

        $this->modelTableName = new TextOrmType($this);
        $this->modelTableName->label = 'Table Name';
        $this->modelTableName->fieldName = 'table_name';
        $this->modelTableName->variableName = 'modelTableName';
        $this->modelTableName->validation = true;

        $this->modelPrimaryIndex = new ExternalOrmType($this);
        $this->modelPrimaryIndex->externalModelClassName = AppModelPrimaryIndexTypeOrmModel::class;
        $this->modelPrimaryIndex->fieldName = 'app_model_primary_index_type';
        $this->modelPrimaryIndex->variableName = 'modelPrimaryIndex';
        $this->modelPrimaryIndex->validation = true;

        $this->modelClassName = new TextOrmType($this);
        $this->modelClassName->label = 'Model Class Name';
        $this->modelClassName->fieldName = 'model_class_name';
        $this->modelClassName->variableName = 'modelClassName';
        $this->modelClassName->validation = true;

        $this->modelNamespace = new TextOrmType($this);
        $this->modelNamespace->label = 'Model Namespace';
        $this->modelNamespace->fieldName = 'model_namespace';
        $this->modelNamespace->variableName = 'modelNamespace';
        $this->modelNamespace->validation = true;

        $this->modelCreateAdminOrm = new YesNoOrmType($this);
        $this->modelCreateAdminOrm->label = 'Create Admin Orm';
        $this->modelCreateAdminOrm->fieldName = 'app_model_create_admin_orm';
        $this->modelCreateAdminOrm->variableName = 'modelCreateAdminOrm';

        $this->rowClassName = new TextOrmType($this);
        $this->rowClassName->label = 'Row Class Name';
        $this->rowClassName->fieldName = 'row_class_name';
        $this->rowClassName->variableName = 'rowClassName';
        $this->rowClassName->allowNullValue = true;

        $this->addDefaultType($this->modelLabel);
        $this->addDefaultOrderType($this->modelTableName);

        $index = new ModelUniqueIndex($this);
        $index->addType($this->modelNamespace);

    }

}