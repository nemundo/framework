<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SqlAnalyzerModel
*/
protected $model;

/**
* @var string
*/
public $sqlQueryId;

/**
* @var string
*/
public $sqlTableName;

/**
* @var string
*/
public $sqlSelectType;

/**
* @var string
*/
public $sqlKey;

/**
* @var int
*/
public $sqlRows;

/**
* @var string
*/
public $sqlExtra;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->sqlQueryId, $this->sqlQueryId);
$this->typeValueList->setModelValue($this->model->sqlTableName, $this->sqlTableName);
$this->typeValueList->setModelValue($this->model->sqlSelectType, $this->sqlSelectType);
$this->typeValueList->setModelValue($this->model->sqlKey, $this->sqlKey);
$this->typeValueList->setModelValue($this->model->sqlRows, $this->sqlRows);
$this->typeValueList->setModelValue($this->model->sqlExtra, $this->sqlExtra);
$id = parent::save();
return $id;
}
}