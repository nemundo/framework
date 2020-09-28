<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
/**
* @return AppAutoNumberTypeRow[]
*/
public function getData() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return AppAutoNumberTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppAutoNumberTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppAutoNumberTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}