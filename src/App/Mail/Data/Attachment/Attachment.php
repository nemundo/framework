<?php
namespace Nemundo\App\Mail\Data\Attachment;
class Attachment extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AttachmentModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->mailQueueId, $this->mailQueueId);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$id = parent::save();
return $id;
}
}