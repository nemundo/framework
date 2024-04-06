<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AttachmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
}