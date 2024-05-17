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

/**
* @var bool
*/
public $hasCustomFilename;

/**
* @var string
*/
public $customFilename;

public function __construct() {
parent::__construct();
$this->model = new AttachmentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->mailQueueId, $this->mailQueueId);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$this->typeValueList->setModelValue($this->model->hasCustomFilename, $this->hasCustomFilename);
$this->typeValueList->setModelValue($this->model->customFilename, $this->customFilename);
parent::update();
}
}