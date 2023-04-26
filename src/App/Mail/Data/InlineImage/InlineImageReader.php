<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var InlineImageModel
*/
public $model;

public function __construct() {
$this->model = new InlineImageModel();
parent::__construct();
}
/**
* @return InlineImageRow[]
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
* @return InlineImageRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return InlineImageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new InlineImageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}