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
* @return \Nemundo\App\Dataset\Reader\Dataset\DatasetDataRow[]
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
* @return \Nemundo\App\Dataset\Reader\Dataset\DatasetDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\App\Dataset\Reader\Dataset\DatasetDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\App\Dataset\Reader\Dataset\DatasetDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}