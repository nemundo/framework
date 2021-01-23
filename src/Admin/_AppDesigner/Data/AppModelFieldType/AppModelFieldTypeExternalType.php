<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fieldType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fieldClassName;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModelFieldTypeModel::class;
$this->externalTableName = "app_model_field_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->fieldType = new \Nemundo\Model\Type\Text\TextType();
$this->fieldType->fieldName = "field_type";
$this->fieldType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fieldType->aliasFieldName = $this->fieldType->tableName . "_" . $this->fieldType->fieldName;
$this->fieldType->label = "";
$this->addType($this->fieldType);

$this->fieldClassName = new \Nemundo\Model\Type\Text\TextType();
$this->fieldClassName->fieldName = "field_class_name";
$this->fieldClassName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fieldClassName->aliasFieldName = $this->fieldClassName->tableName . "_" . $this->fieldClassName->fieldName;
$this->fieldClassName->label = "";
$this->addType($this->fieldClassName);

}
}