<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SourceTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $sourceType;

/**
* @var string
*/
public $phpClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->sourceType = $this->getModelValue($model->sourceType);
$this->phpClass = $this->getModelValue($model->phpClass);
}
}