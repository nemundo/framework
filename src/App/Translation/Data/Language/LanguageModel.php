<?php
namespace Nemundo\App\Translation\Data\Language;
class LanguageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $code;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $language;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $default;

protected function loadModel() {
$this->tableName = "translation_language";
$this->aliasTableName = "translation_language";
$this->label = "Language";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_language";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_language_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->code = new \Nemundo\Model\Type\Text\TextType($this);
$this->code->tableName = "translation_language";
$this->code->fieldName = "code";
$this->code->aliasFieldName = "translation_language_code";
$this->code->label = "Code";
$this->code->allowNullValue = false;
$this->code->length = 10;

$this->language = new \Nemundo\Model\Type\Text\TextType($this);
$this->language->tableName = "translation_language";
$this->language->fieldName = "language";
$this->language->aliasFieldName = "translation_language_language";
$this->language->label = "Language";
$this->language->allowNullValue = false;
$this->language->length = 255;

$this->default = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->default->tableName = "translation_language";
$this->default->fieldName = "default";
$this->default->aliasFieldName = "translation_language_default";
$this->default->label = "Default";
$this->default->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "code";
$index->addType($this->code);

}
}