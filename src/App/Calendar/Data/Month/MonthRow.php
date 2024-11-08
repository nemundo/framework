<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MonthModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $month;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->month = $this->getModelValue($model->month);
}
}