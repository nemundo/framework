<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sourceType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SourceTypeModel::class;
$this->externalTableName = "translation_source_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->sourceType = new \Nemundo\Model\Type\Text\TextType();
$this->sourceType->fieldName = "source_type";
$this->sourceType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceType->aliasFieldName = $this->sourceType->tableName . "_" . $this->sourceType->fieldName;
$this->sourceType->label = "Source Type";
$this->addType($this->sourceType);

$this->phpClass = new \Nemundo\Model\Type\Text\TextType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

}
}