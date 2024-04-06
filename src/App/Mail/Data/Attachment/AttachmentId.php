<?php
namespace Nemundo\App\Mail\Data\Attachment;
use Nemundo\Model\Id\AbstractModelIdValue;
class AttachmentId extends AbstractModelIdValue {
/**
* @var AttachmentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
}