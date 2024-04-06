<?php
namespace Nemundo\App\Mail\Data\Attachment;
use Nemundo\Model\Data\AbstractModelUpdate;
class AttachmentUpdate extends AbstractModelUpdate {
/**
* @var AttachmentModel
*/
public $model;

/**
* @var string
*/
public $mailQueueId;

/**
* @var string
*/
public $filename;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->mailQueueId, $this->mailQueueId);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
parent::update();
}
}