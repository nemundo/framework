<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $keepOrginalFilename;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppFileTypeModel::class;
$this->externalTableName = "app_model_file";
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

$this->keepOrginalFilename = new \Nemundo\Model\Type\Number\YesNoType();
$this->keepOrginalFilename->fieldName = "keep_orginal_filename";
$this->keepOrginalFilename->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->keepOrginalFilename->aliasFieldName = $this->keepOrginalFilename->tableName . "_" . $this->keepOrginalFilename->fieldName;
$this->keepOrginalFilename->label = "";
$this->addType($this->keepOrginalFilename);

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