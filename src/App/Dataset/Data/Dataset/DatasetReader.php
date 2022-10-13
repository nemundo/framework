<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DatasetModel
*/
public $model;

public function __construct() {
$this->model = new DatasetModel();
parent::__construct();
}
/**
* @return DatasetRow[]
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
* @return DatasetRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return DatasetRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new DatasetRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}