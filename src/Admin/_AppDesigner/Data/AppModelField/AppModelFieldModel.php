<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $appModel;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appFieldTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeExternalType
*/
public $appFieldType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appFieldLabel;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appFieldVariableName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appFieldName;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appAllowNullValue;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appFieldValidation;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appFieldDefaultValue;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $formVisible;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $tableVisible;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $viewVisible;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $itemOrder;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadModel() {
$this->tableName = "app_model_field";
$this->aliasTableName = "app_model_field";
$this->label = "Model Field";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_field";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_field_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appModelId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appModelId->tableName = "app_model_field";
$this->appModelId->fieldName = "app_model";
$this->appModelId->aliasFieldName = "app_model_field_app_model";
$this->appModelId->label = "";
$this->appModelId->allowNullValue = false;

$this->appFieldTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldTypeId->tableName = "app_model_field";
$this->appFieldTypeId->fieldName = "app_model_field_type";
$this->appFieldTypeId->aliasFieldName = "app_model_field_app_model_field_type";
$this->appFieldTypeId->label = "";
$this->appFieldTypeId->allowNullValue = false;

$this->appFieldLabel = new \Nemundo\Model\Type\Text\TextType($this);
$this->appFieldLabel->tableName = "app_model_field";
$this->appFieldLabel->fieldName = "field_label";
$this->appFieldLabel->aliasFieldName = "app_model_field_field_label";
$this->appFieldLabel->label = "Field Label";
$this->appFieldLabel->allowNullValue = false;
$this->appFieldLabel->length = 255;

$this->appFieldVariableName = new \Nemundo\Model\Type\Text\TextType($this);
$this->appFieldVariableName->tableName = "app_model_field";
$this->appFieldVariableName->fieldName = "variable_name";
$this->appFieldVariableName->aliasFieldName = "app_model_field_variable_name";
$this->appFieldVariableName->label = "Variable Name";
$this->appFieldVariableName->validation = true;
$this->appFieldVariableName->allowNullValue = false;
$this->appFieldVariableName->length = 255;

$this->appFieldName = new \Nemundo\Model\Type\Text\TextType($this);
$this->appFieldName->tableName = "app_model_field";
$this->appFieldName->fieldName = "field_name";
$this->appFieldName->aliasFieldName = "app_model_field_field_name";
$this->appFieldName->label = "Field Name";
$this->appFieldName->validation = true;
$this->appFieldName->allowNullValue = false;
$this->appFieldName->length = 255;

$this->appAllowNullValue = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->appAllowNullValue->tableName = "app_model_field";
$this->appAllowNullValue->fieldName = "allow_null_value";
$this->appAllowNullValue->aliasFieldName = "app_model_field_allow_null_value";
$this->appAllowNullValue->label = "";
$this->appAllowNullValue->allowNullValue = false;

$this->appFieldValidation = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->appFieldValidation->tableName = "app_model_field";
$this->appFieldValidation->fieldName = "field_validation";
$this->appFieldValidation->aliasFieldName = "app_model_field_field_validation";
$this->appFieldValidation->label = "Field Validation";
$this->appFieldValidation->allowNullValue = false;

$this->appFieldDefaultValue = new \Nemundo\Model\Type\Text\TextType($this);
$this->appFieldDefaultValue->tableName = "app_model_field";
$this->appFieldDefaultValue->fieldName = "field_default_value";
$this->appFieldDefaultValue->aliasFieldName = "app_model_field_field_default_value";
$this->appFieldDefaultValue->label = "";
$this->appFieldDefaultValue->allowNullValue = false;
$this->appFieldDefaultValue->length = 255;

$this->formVisible = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->formVisible->tableName = "app_model_field";
$this->formVisible->fieldName = "form_visible";
$this->formVisible->aliasFieldName = "app_model_field_form_visible";
$this->formVisible->label = "";
$this->formVisible->allowNullValue = false;

$this->tableVisible = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->tableVisible->tableName = "app_model_field";
$this->tableVisible->fieldName = "table_visible";
$this->tableVisible->aliasFieldName = "app_model_field_table_visible";
$this->tableVisible->label = "";
$this->tableVisible->allowNullValue = false;

$this->viewVisible = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->viewVisible->tableName = "app_model_field";
$this->viewVisible->fieldName = "view_visible";
$this->viewVisible->aliasFieldName = "app_model_field_view_visible";
$this->viewVisible->label = "";
$this->viewVisible->allowNullValue = false;

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType($this);
$this->itemOrder->tableName = "app_model_field";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "app_model_field_item_order";
$this->itemOrder->label = "";
$this->itemOrder->allowNullValue = false;
$this->itemOrder->visible->form = false;
$this->itemOrder->visible->table = false;
$this->itemOrder->visible->view = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "app_model_field";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "app_model_field_active";
$this->active->label = "Active";
$this->active->defaultValue = 1;
$this->active->allowNullValue = false;
$this->active->visible->form = false;
$this->active->visible->table = false;
$this->active->visible->view = false;

$this->addDefaultType($this->appFieldLabel);
$this->addDefaultOrderType($this->itemOrder);
}
public function loadAppModel() {
if ($this->appModel == null) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType($this, "app_model_field_app_model");
$this->appModel->tableName = "app_model_field";
$this->appModel->fieldName = "app_model";
$this->appModel->aliasFieldName = "app_model_field_app_model";
$this->appModel->label = "";
}
return $this;
}
public function loadAppFieldType() {
if ($this->appFieldType == null) {
$this->appFieldType = new \Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeExternalType($this, "app_model_field_app_model_field_type");
$this->appFieldType->tableName = "app_model_field";
$this->appFieldType->fieldName = "app_model_field_type";
$this->appFieldType->aliasFieldName = "app_model_field_app_model_field_type";
$this->appFieldType->label = "";
$this->appFieldType->validation = true;
}
return $this;
}
}