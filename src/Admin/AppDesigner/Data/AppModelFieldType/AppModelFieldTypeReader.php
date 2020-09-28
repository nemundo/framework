<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppModelFieldTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
/**
* @return AppModelFieldTypeRow[]
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
* @return AppModelFieldTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppModelFieldTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppModelFieldTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}