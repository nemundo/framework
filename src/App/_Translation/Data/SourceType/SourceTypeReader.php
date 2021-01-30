<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
/**
* @return SourceTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return SourceTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SourceTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SourceTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}