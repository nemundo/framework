<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppPhpClassTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPhpClassTypeModel();
}
/**
* @return AppPhpClassTypeRow[]
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
* @return AppPhpClassTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppPhpClassTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppPhpClassTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}