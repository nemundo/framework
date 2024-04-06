<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AttachmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
}