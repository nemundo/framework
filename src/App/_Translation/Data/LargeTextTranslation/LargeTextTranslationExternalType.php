<?php
namespace Nemundo\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $languageId;

/**
* @var \Nemundo\App\Translation\Data\Language\LanguageExternalType
*/
public $language;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $sourceId;

/**
* @var \Nemundo\App\Translation\Data\Source\SourceExternalType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $largeText;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LargeTextTranslationModel::class;
$this->externalTableName = "translation_large_text_translation";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->languageId = new \Nemundo\Model\Type\Id\IdType();
$this->languageId->fieldName = "language";
$this->languageId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->languageId->aliasFieldName = $this->languageId->tableName ."_".$this->languageId->fieldName;
$this->languageId->label = "Language";
$this->addType($this->languageId);

$this->sourceId = new \Nemundo\Model\Type\Id\IdType();
$this->sourceId->fieldName = "source";
$this->sourceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceId->aliasFieldName = $this->sourceId->tableName ."_".$this->sourceId->fieldName;
$this->sourceId->label = "Source";
$this->addType($this->sourceId);

$this->largeText = new \Nemundo\Model\Type\Text\LargeTextType();
$this->largeText->fieldName = "large_text";
$this->largeText->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->largeText->aliasFieldName = $this->largeText->tableName . "_" . $this->largeText->fieldName;
$this->largeText->label = "Large Text";
$this->addType($this->largeText);

}
public function loadLanguage() {
if ($this->language == null) {
$this->language = new \Nemundo\App\Translation\Data\Language\LanguageExternalType(null, $this->parentFieldName . "_language");
$this->language->fieldName = "language";
$this->language->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->language->aliasFieldName = $this->language->tableName ."_".$this->language->fieldName;
$this->language->label = "Language";
$this->addType($this->language);
}
return $this;
}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Nemundo\App\Translation\Data\Source\SourceExternalType(null, $this->parentFieldName . "_source");
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName ."_".$this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);
}
return $this;
}
}