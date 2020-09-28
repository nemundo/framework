<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SqlAnalyzerModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $sqlQueryId;

/**
* @var \Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryRow
*/
public $sqlQuery;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->sqlQueryId = $this->getModelValue($model->sqlQueryId);
if ($model->sqlQuery !== null) {
$this->loadNemundoAdminSqlAnalyzerDataSqlAnalyzerQuerySqlAnalyzerQuerysqlQueryRow($model->sqlQuery);
}
$this->sqlTableName = $this->getModelValue($model->sqlTableName);
$this->sqlSelectType = $this->getModelValue($model->sqlSelectType);
$this->sqlKey = $this->getModelValue($model->sqlKey);
$this->sqlRows = $this->getModelValue($model->sqlRows);
$this->sqlExtra = $this->getModelValue($model->sqlExtra);
}
private function loadNemundoAdminSqlAnalyzerDataSqlAnalyzerQuerySqlAnalyzerQuerysqlQueryRow($model) {
$this->sqlQuery = new \Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryRow($this->row, $model);
}
}