<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppFileTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
/**
* @return AppFileTypeRow[]
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
* @return AppFileTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppFileTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppFileTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}