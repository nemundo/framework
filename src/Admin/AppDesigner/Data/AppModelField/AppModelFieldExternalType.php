<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $appModel;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModelFieldModel::class;
$this->externalTableName = "app_model_field";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->appModelId = new \Nemundo\Model\Type\Id\IdType();
$this->appModelId->fieldName = "app_model";
$this->appModelId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appModelId->aliasFieldName = $this->appModelId->tableName ."_".$this->appModelId->fieldName;
$this->appModelId->label = "";
$this->addType($this->appModelId);

$this->appFieldTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->appFieldTypeId->fieldName = "app_model_field_type";
$this->appFieldTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldTypeId->aliasFieldName = $this->appFieldTypeId->tableName ."_".$this->appFieldTypeId->fieldName;
$this->appFieldTypeId->label = "";
$this->addType($this->appFieldTypeId);

$this->appFieldLabel = new \Nemundo\Model\Type\Text\TextType();
$this->appFieldLabel->fieldName = "field_label";
$this->appFieldLabel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldLabel->aliasFieldName = $this->appFieldLabel->tableName . "_" . $this->appFieldLabel->fieldName;
$this->appFieldLabel->label = "Field Label";
$this->addType($this->appFieldLabel);

$this->appFieldVariableName = new \Nemundo\Model\Type\Text\TextType();
$this->appFieldVariableName->fieldName = "variable_name";
$this->appFieldVariableName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldVariableName->aliasFieldName = $this->appFieldVariableName->tableName . "_" . $this->appFieldVariableName->fieldName;
$this->appFieldVariableName->label = "Variable Name";
$this->addType($this->appFieldVariableName);

$this->appFieldName = new \Nemundo\Model\Type\Text\TextType();
$this->appFieldName->fieldName = "field_name";
$this->appFieldName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldName->aliasFieldName = $this->appFieldName->tableName . "_" . $this->appFieldName->fieldName;
$this->appFieldName->label = "Field Name";
$this->addType($this->appFieldName);

$this->appAllowNullValue = new \Nemundo\Model\Type\Number\YesNoType();
$this->appAllowNullValue->fieldName = "allow_null_value";
$this->appAllowNullValue->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appAllowNullValue->aliasFieldName = $this->appAllowNullValue->tableName . "_" . $this->appAllowNullValue->fieldName;
$this->appAllowNullValue->label = "";
$this->addType($this->appAllowNullValue);

$this->appFieldValidation = new \Nemundo\Model\Type\Number\YesNoType();
$this->appFieldValidation->fieldName = "field_validation";
$this->appFieldValidation->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldValidation->aliasFieldName = $this->appFieldValidation->tableName . "_" . $this->appFieldValidation->fieldName;
$this->appFieldValidation->label = "Field Validation";
$this->addType($this->appFieldValidation);

$this->appFieldDefaultValue = new \Nemundo\Model\Type\Text\TextType();
$this->appFieldDefaultValue->fieldName = "field_default_value";
$this->appFieldDefaultValue->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldDefaultValue->aliasFieldName = $this->appFieldDefaultValue->tableName . "_" . $this->appFieldDefaultValue->fieldName;
$this->appFieldDefaultValue->label = "";
$this->addType($this->appFieldDefaultValue);

$this->formVisible = new \Nemundo\Model\Type\Number\YesNoType();
$this->formVisible->fieldName = "form_visible";
$this->formVisible->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->formVisible->aliasFieldName = $this->formVisible->tableName . "_" . $this->formVisible->fieldName;
$this->formVisible->label = "";
$this->addType($this->formVisible);

$this->tableVisible = new \Nemundo\Model\Type\Number\YesNoType();
$this->tableVisible->fieldName = "table_visible";
$this->tableVisible->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->tableVisible->aliasFieldName = $this->tableVisible->tableName . "_" . $this->tableVisible->fieldName;
$this->tableVisible->label = "";
$this->addType($this->tableVisible);

$this->viewVisible = new \Nemundo\Model\Type\Number\YesNoType();
$this->viewVisible->fieldName = "view_visible";
$this->viewVisible->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->viewVisible->aliasFieldName = $this->viewVisible->tableName . "_" . $this->viewVisible->fieldName;
$this->viewVisible->label = "";
$this->addType($this->viewVisible);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "";
$this->addType($this->itemOrder);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

}
public function loadAppModel() {
if ($this->appModel == null) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType(null, $this->parentFieldName . "_app_model");
$this->appModel->fieldName = "app_model";
$this->appModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appModel->aliasFieldName = $this->appModel->tableName ."_".$this->appModel->fieldName;
$this->appModel->label = "";
$this->addType($this->appModel);
}
return $this;
}
public function loadAppFieldType() {
if ($this->appFieldType == null) {
$this->appFieldType = new \Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeExternalType(null, $this->parentFieldName . "_app_model_field_type");
$this->appFieldType->fieldName = "app_model_field_type";
$this->appFieldType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldType->aliasFieldName = $this->appFieldType->tableName ."_".$this->appFieldType->fieldName;
$this->appFieldType->label = "";
$this->addType($this->appFieldType);
}
return $this;
}
}