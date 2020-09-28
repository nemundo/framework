<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppModelIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
/**
* @return AppModelIndexRow[]
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
* @return AppModelIndexRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppModelIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppModelIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}