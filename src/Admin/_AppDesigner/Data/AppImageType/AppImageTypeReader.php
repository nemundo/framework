<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppImageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
/**
* @return AppImageTypeRow[]
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
* @return AppImageTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppImageTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppImageTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}