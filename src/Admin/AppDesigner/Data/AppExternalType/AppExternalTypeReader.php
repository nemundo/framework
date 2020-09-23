<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppExternalTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalTypeModel();
}
/**
* @return AppExternalTypeRow[]
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
* @return AppExternalTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppExternalTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppExternalTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}