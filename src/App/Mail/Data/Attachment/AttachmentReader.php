<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var AttachmentModel
*/
public $model;

public function __construct() {
$this->model = new AttachmentModel();
parent::__construct();
}
/**
* @return AttachmentRow[]
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
* @return AttachmentRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return AttachmentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new AttachmentRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}