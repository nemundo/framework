<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AttachmentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $mailQueueId;

/**
* @var \Nemundo\App\Mail\Data\MailQueue\MailQueueRow
*/
public $mailQueue;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->mailQueueId = intval($this->getModelValue($model->mailQueueId));
if ($model->mailQueue !== null) {
$this->loadNemundoAppMailDataMailQueueMailQueuemailQueueRow($model->mailQueue);
}
$this->filename = $this->getModelValue($model->filename);
$this->hasCustomFilename = boolval($this->getModelValue($model->hasCustomFilename));
$this->customFilename = $this->getModelValue($model->customFilename);
}
private function loadNemundoAppMailDataMailQueueMailQueuemailQueueRow($model) {
$this->mailQueue = new \Nemundo\App\Mail\Data\MailQueue\MailQueueRow($this->row, $model);
}
}