<?php
namespace Nemundo\App\Translation\Data\Source;
class SourceModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "translation_source";
$this->aliasTableName = "translation_source";
$this->label = "Source";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_source";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_source_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->sourceTypeId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->sourceTypeId->tableName = "translation_source";
$this->sourceTypeId->fieldName = "source_type";
$this->sourceTypeId->aliasFieldName = "translation_source_source_type";
$this->sourceTypeId->label = "Source Type";
$this->sourceTypeId->allowNullValue = false;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "translation_source";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "translation_source_source";
$this->source->label = "Source";
$this->source->allowNullValue = false;
$this->source->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "source_type_source";
$index->addType($this->sourceTypeId);
$index->addType($this->source);

}
public function loadSourceType() {
if ($this->sourceType == null) {
$this->sourceType = new \Nemundo\App\Translation\Data\SourceType\SourceTypeExternalType($this, "translation_source_source_type");
$this->sourceType->tableName = "translation_source";
$this->sourceType->fieldName = "source_type";
$this->sourceType->aliasFieldName = "translation_source_source_type";
$this->sourceType->label = "Source Type";
}
return $this;
}
}