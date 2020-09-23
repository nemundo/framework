<?php

namespace Nemundo\Admin\AppDesigner\Model\Model;


use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Definition\Model\ModelTrait\ActiveModelTrait;
use Nemundo\Model\Definition\Model\ModelTrait\SortableTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\YesNoOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppModelFieldOrmModel extends AbstractOrmModel
{

    use SortableTrait;

    use ActiveModelTrait;

    /**
     * @var ExternalOrmType
     */
    public $appModel;

    /**
     * @var TextOrmType
     */
    public $appFieldVariableName;

    /**
     * @var TextOrmType
     */
    public $appFieldName;

    /**
     * @var TextOrmType
     */
    public $appFieldLabel;

    /**
     * @var ExternalOrmType
     */
    public $appFieldType;

    /**
     * @var YesNoOrmType
     */
    public $appAllowNullValue;

    /**
     * @var YesNoOrmType
     */
    public $appFieldValidation;

    /**
     * @var TextOrmType
     */
    public $appFieldDefaultValue;

    /**
     * @var YesNoOrmType
     */
    public $formVisible;

    /**
     * @var YesNoOrmType
     */
    public $tableVisible;

    /**
     * @var YesNoOrmType
     */
    public $viewVisible;


    protected function loadModel()
    {

        $this->label = 'Model Field';
        $this->tableName = 'app_model_field';
        $this->className = 'AppModelField';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelField';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appModel = new ExternalOrmType($this);
        $this->appModel->externalModelClassName = AppModelOrmModel::class;
        $this->appModel->fieldName = 'app_model';
        $this->appModel->variableName = 'appModel';

        $this->appFieldType = new ExternalOrmType($this);
        $this->appFieldType->externalModelClassName = AppModelFieldTypeOrmModel::class;
        $this->appFieldType->fieldName = 'app_model_field_type';
        $this->appFieldType->variableName = 'appFieldType';
        $this->appFieldType->validation = true;

        $this->appFieldLabel = new TextOrmType($this);
        $this->appFieldLabel->fieldName = 'field_label';
        $this->appFieldLabel->variableName = 'appFieldLabel';
        $this->appFieldLabel->label = 'Field Label';

        $this->appFieldVariableName = new TextOrmType($this);
        $this->appFieldVariableName->fieldName = 'variable_name';
        $this->appFieldVariableName->variableName = 'appFieldVariableName';
        $this->appFieldVariableName->label = 'Variable Name';
        $this->appFieldVariableName->validation = true;

        $this->appFieldName = new TextOrmType($this);
        $this->appFieldName->fieldName = 'field_name';
        $this->appFieldName->variableName = 'appFieldName';
        $this->appFieldName->label = 'Field Name';
        $this->appFieldName->validation = true;

        $this->appAllowNullValue = new YesNoOrmType($this);
        $this->appAllowNullValue->fieldName = 'allow_null_value';
        $this->appAllowNullValue->variableName = 'appAllowNullValue';
        //$this->appAllowNullValue->label = 'Field Validation';


        $this->appFieldValidation = new YesNoOrmType($this);
        $this->appFieldValidation->fieldName = 'field_validation';
        $this->appFieldValidation->variableName = 'appFieldValidation';
        $this->appFieldValidation->label = 'Field Validation';

        $this->appFieldDefaultValue = new TextOrmType($this);
        $this->appFieldDefaultValue->fieldName = 'field_default_value';
        $this->appFieldDefaultValue->variableName = 'appFieldDefaultValue';

        $this->formVisible = new YesNoOrmType($this);
        $this->formVisible->fieldName = 'form_visible';
        $this->formVisible->variableName = 'formVisible';

        $this->tableVisible = new YesNoOrmType($this);
        $this->tableVisible->fieldName = 'table_visible';
        $this->tableVisible->variableName = 'tableVisible';

        $this->viewVisible = new YesNoOrmType($this);
        $this->viewVisible->fieldName = 'view_visible';
        $this->viewVisible->variableName = 'viewVisible';

        $this->loadSortable();
        $this->loadActiveModelTrait();


        $this->addDefaultType($this->appFieldLabel);

        //$this->addInsertAction(new AppModelFieldAction());

    }

}