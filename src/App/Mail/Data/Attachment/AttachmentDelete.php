<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AttachmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
}