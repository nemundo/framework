<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClassName;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppPhpClassTypeModel::class;
$this->externalTableName = "app_model_php_class";
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

$this->phpClassName = new \Nemundo\Model\Type\Text\TextType();
$this->phpClassName->fieldName = "php_class_name";
$this->phpClassName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClassName->aliasFieldName = $this->phpClassName->tableName . "_" . $this->phpClassName->fieldName;
$this->phpClassName->label = "";
$this->addType($this->phpClassName);

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