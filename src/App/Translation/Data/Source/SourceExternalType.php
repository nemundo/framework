<?php
namespace Nemundo\App\Translation\Data\Source;
class SourceExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $sourceTypeId;

/**
* @var \Nemundo\App\Translation\Data\SourceType\SourceTypeExternalType
*/
public $sourceType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SourceModel::class;
$this->externalTableName = "translation_source";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->sourceTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->sourceTypeId->fieldName = "source_type";
$this->sourceTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceTypeId->aliasFieldName = $this->sourceTypeId->tableName ."_".$this->sourceTypeId->fieldName;
$this->sourceTypeId->label = "Source Type";
$this->addType($this->sourceTypeId);

$this->source = new \Nemundo\Model\Type\Text\TextType();
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName . "_" . $this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);

}
public function loadSourceType() {
if ($this->sourceType == null) {
$this->sourceType = new \Nemundo\App\Translation\Data\SourceType\SourceTypeExternalType(null, $this->parentFieldName . "_source_type");
$this->sourceType->fieldName = "source_type";
$this->sourceType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceType->aliasFieldName = $this->sourceType->tableName ."_".$this->sourceType->fieldName;
$this->sourceType->label = "Source Type";
$this->addType($this->sourceType);
}
return $this;
}
}