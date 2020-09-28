<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppTextTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
/**
* @return AppTextTypeRow[]
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
* @return AppTextTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppTextTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppTextTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}