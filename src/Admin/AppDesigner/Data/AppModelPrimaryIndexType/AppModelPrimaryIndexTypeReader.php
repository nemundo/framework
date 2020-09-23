<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
/**
* @return AppModelPrimaryIndexTypeRow[]
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
* @return AppModelPrimaryIndexTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppModelPrimaryIndexTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppModelPrimaryIndexTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}