<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $appFieldId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType
*/
public $appField;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $externalModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $externalModel;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appLoadModel;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppExternalTypeModel::class;
$this->externalTableName = "app_model_external";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->appFieldId = new \Nemundo\Model\Type\Id\IdType();
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldId->aliasFieldName = $this->appFieldId->tableName ."_".$this->appFieldId->fieldName;
$this->appFieldId->label = "";
$this->addType($this->appFieldId);

$this->externalModelId = new \Nemundo\Model\Type\Id\IdType();
$this->externalModelId->fieldName = "external_field";
$this->externalModelId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->externalModelId->aliasFieldName = $this->externalModelId->tableName ."_".$this->externalModelId->fieldName;
$this->externalModelId->label = "";
$this->addType($this->externalModelId);

$this->appLoadModel = new \Nemundo\Model\Type\Number\YesNoType();
$this->appLoadModel->fieldName = "load_model";
$this->appLoadModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appLoadModel->aliasFieldName = $this->appLoadModel->tableName . "_" . $this->appLoadModel->fieldName;
$this->appLoadModel->label = "";
$this->addType($this->appLoadModel);

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType(null, $this->parentFieldName . "_app_model_field");
$this->appField->fieldName = "app_model_field";
$this->appField->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appField->aliasFieldName = $this->appField->tableName ."_".$this->appField->fieldName;
$this->appField->label = "";
$this->addType($this->appField);
}
return $this;
}
public function loadExternalModel() {
if ($this->externalModel == null) {
$this->externalModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType(null, $this->parentFieldName . "_external_field");
$this->externalModel->fieldName = "external_field";
$this->externalModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->externalModel->aliasFieldName = $this->externalModel->tableName ."_".$this->externalModel->fieldName;
$this->externalModel->label = "";
$this->addType($this->externalModel);
}
return $this;
}
}