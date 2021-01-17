<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sourceType;

protected function loadModel() {
$this->tableName = "translation_source_type";
$this->aliasTableName = "translation_source_type";
$this->label = "Source Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_source_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_source_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->sourceType = new \Nemundo\Model\Type\Text\TextType($this);
$this->sourceType->tableName = "translation_source_type";
$this->sourceType->fieldName = "source_type";
$this->sourceType->aliasFieldName = "translation_source_type_source_type";
$this->sourceType->label = "Source Type";
$this->sourceType->allowNullValue = false;
$this->sourceType->length = 50;

}
}