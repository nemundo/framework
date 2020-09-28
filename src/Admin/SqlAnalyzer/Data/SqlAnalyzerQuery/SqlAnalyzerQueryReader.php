<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerQueryModel();
}
/**
* @return SqlAnalyzerQueryRow[]
*/
public function getData() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return SqlAnalyzerQueryRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SqlAnalyzerQueryRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SqlAnalyzerQueryRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}