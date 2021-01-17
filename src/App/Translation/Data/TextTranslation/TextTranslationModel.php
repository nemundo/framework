<?php
namespace Nemundo\App\Translation\Data\TextTranslation;
class TextTranslationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $languageId;

/**
* @var \Nemundo\App\Translation\Data\Language\LanguageExternalType
*/
public $language;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $sourceId;

/**
* @var \Nemundo\App\Translation\Data\Source\SourceExternalType
*/
public $source;

protected function loadModel() {
$this->tableName = "translation_text_translation";
$this->aliasTableName = "translation_text_translation";
$this->label = "Text Translation";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "translation_text_translation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "translation_text_translation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->languageId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->languageId->tableName = "translation_text_translation";
$this->languageId->fieldName = "language";
$this->languageId->aliasFieldName = "translation_text_translation_language";
$this->languageId->label = "Language";
$this->languageId->allowNullValue = false;

$this->text = new \Nemundo\Model\Type\Text\TextType($this);
$this->text->tableName = "translation_text_translation";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "translation_text_translation_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;
$this->text->length = 255;

$this->sourceId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->sourceId->tableName = "translation_text_translation";
$this->sourceId->fieldName = "source";
$this->sourceId->aliasFieldName = "translation_text_translation_source";
$this->sourceId->label = "Source";
$this->sourceId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "language_unique_id";
$index->addType($this->languageId);
$index->addType($this->sourceId);

}
public function loadLanguage() {
if ($this->language == null) {
$this->language = new \Nemundo\App\Translation\Data\Language\LanguageExternalType($this, "translation_text_translation_language");
$this->language->tableName = "translation_text_translation";
$this->language->fieldName = "language";
$this->language->aliasFieldName = "translation_text_translation_language";
$this->language->label = "Language";
}
return $this;
}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Nemundo\App\Translation\Data\Source\SourceExternalType($this, "translation_text_translation_source");
$this->source->tableName = "translation_text_translation";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "translation_text_translation_source";
$this->source->label = "Source";
}
return $this;
}
}