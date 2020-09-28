<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appLoadModel;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppExternalUserTypeModel::class;
$this->externalTableName = "app_model_external_user";
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
}