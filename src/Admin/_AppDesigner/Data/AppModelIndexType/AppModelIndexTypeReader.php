<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppModelIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
/**
* @return AppModelIndexTypeRow[]
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
* @return AppModelIndexTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppModelIndexTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppModelIndexTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}