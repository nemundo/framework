<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
use Nemundo\Model\Data\AbstractModelUpdate;
class SqlAnalyzerQueryUpdate extends AbstractModelUpdate {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

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

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerQueryModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->sqlQuery, $this->sqlQuery);
$this->typeValueList->setModelValue($this->model->sqlResultRows, $this->sqlResultRows);
$value = (new \Nemundo\Core\Type\Text\Text($this->sqlTime))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->sqlTime, $value);
parent::update();
}
}