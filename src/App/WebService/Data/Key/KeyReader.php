<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var KeyModel
*/
public $model;

public function __construct() {
$this->model = new KeyModel();
parent::__construct();
}
/**
* @return KeyRow[]
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
* @return KeyRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return KeyRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new KeyRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}