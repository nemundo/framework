<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
/**
* @return AppModelRow[]
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
* @return AppModelRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppModelRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppModelRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}