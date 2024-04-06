<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AttachmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
/**
* @return AttachmentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AttachmentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}