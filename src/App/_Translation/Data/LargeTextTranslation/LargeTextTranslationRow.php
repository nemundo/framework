<?php
namespace Nemundo\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LargeTextTranslationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $languageId;

/**
* @var \Nemundo\App\Translation\Data\Language\LanguageRow
*/
public $language;

/**
* @var int
*/
public $sourceId;

/**
* @var \Nemundo\App\Translation\Data\Source\SourceRow
*/
public $source;

/**
* @var string
*/
public $largeText;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->languageId = intval($this->getModelValue($model->languageId));
if ($model->language !== null) {
$this->loadNemundoAppTranslationDataLanguageLanguagelanguageRow($model->language);
}
$this->sourceId = intval($this->getModelValue($model->sourceId));
if ($model->source !== null) {
$this->loadNemundoAppTranslationDataSourceSourcesourceRow($model->source);
}
$this->largeText = $this->getModelValue($model->largeText);
}
private function loadNemundoAppTranslationDataLanguageLanguagelanguageRow($model) {
$this->language = new \Nemundo\App\Translation\Data\Language\LanguageRow($this->row, $model);
}
private function loadNemundoAppTranslationDataSourceSourcesourceRow($model) {
$this->source = new \Nemundo\App\Translation\Data\Source\SourceRow($this->row, $model);
}
}