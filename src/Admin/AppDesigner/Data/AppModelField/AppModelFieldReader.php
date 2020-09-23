<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppModelFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
/**
* @return AppModelFieldRow[]
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
* @return AppModelFieldRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppModelFieldRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppModelFieldRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}