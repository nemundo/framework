<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SchedulerModel
*/
public $model;

public function __construct() {
$this->model = new SchedulerModel();
parent::__construct();
}
/**
* @return SchedulerRow[]
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
* @return SchedulerRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SchedulerRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SchedulerRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}