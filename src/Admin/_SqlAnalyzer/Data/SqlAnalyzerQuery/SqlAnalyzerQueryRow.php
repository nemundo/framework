<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SqlAnalyzerQueryModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $sqlQuery;

/**
* @var int
*/
public $sqlResultRows;

/**
* @var float
*/
public $sqlTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->sqlQuery = $this->getModelValue($model->sqlQuery);
$this->sqlResultRows = $this->getModelValue($model->sqlResultRows);
$this->sqlTime = $this->getModelValue($model->sqlTime);
}
}