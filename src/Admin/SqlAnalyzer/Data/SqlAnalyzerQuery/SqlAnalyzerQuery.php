<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQuery extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SqlAnalyzerQueryModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->sqlQuery, $this->sqlQuery);
$this->typeValueList->setModelValue($this->model->sqlResultRows, $this->sqlResultRows);
$value = (new \Nemundo\Core\Type\Text\Text($this->sqlTime))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->sqlTime, $value);
$id = parent::save();
return $id;
}
}