<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $indexType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $indexTypeClassName;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModelIndexTypeModel::class;
$this->externalTableName = "app_model_index_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->indexType = new \Nemundo\Model\Type\Text\TextType();
$this->indexType->fieldName = "index_type";
$this->indexType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->indexType->aliasFieldName = $this->indexType->tableName . "_" . $this->indexType->fieldName;
$this->indexType->label = "";
$this->addType($this->indexType);

$this->indexTypeClassName = new \Nemundo\Model\Type\Text\TextType();
$this->indexTypeClassName->fieldName = "index_type_class_name";
$this->indexTypeClassName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->indexTypeClassName->aliasFieldName = $this->indexTypeClassName->tableName . "_" . $this->indexTypeClassName->fieldName;
$this->indexTypeClassName->label = "";
$this->addType($this->indexTypeClassName);

}
}