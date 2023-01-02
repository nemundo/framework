<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MonthModel
*/
public $model;

public function __construct() {
$this->model = new MonthModel();
parent::__construct();
}
/**
* @return MonthRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return MonthRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MonthRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MonthRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}