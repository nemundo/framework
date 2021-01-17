<?php
namespace Nemundo\App\Translation\Data\Source;
class SourceRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SourceModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $sourceTypeId;

/**
* @var \Nemundo\App\Translation\Data\SourceType\SourceTypeRow
*/
public $sourceType;

/**
* @var string
*/
public $source;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->sourceTypeId = intval($this->getModelValue($model->sourceTypeId));
if ($model->sourceType !== null) {
$this->loadNemundoAppTranslationDataSourceTypeSourceTypesourceTypeRow($model->sourceType);
}
$this->source = $this->getModelValue($model->source);
}
private function loadNemundoAppTranslationDataSourceTypeSourceTypesourceTypeRow($model) {
$this->sourceType = new \Nemundo\App\Translation\Data\SourceType\SourceTypeRow($this->row, $model);
}
}