<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AppImageResizeTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
/**
* @return AppImageResizeTypeRow[]
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
* @return AppImageResizeTypeRow
*/
public function getRow() {
//$this->addFieldByModel($this->model);
//$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AppImageResizeTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AppImageResizeTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}