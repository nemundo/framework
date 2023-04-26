<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var InlineImageModel
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
public $cid;

/**
* @var string
*/
public $filename;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->mailQueueId = intval($this->getModelValue($model->mailQueueId));
if ($model->mailQueue !== null) {
$this->loadNemundoAppMailDataMailQueueMailQueuemailQueueRow($model->mailQueue);
}
$this->cid = $this->getModelValue($model->cid);
$this->filename = $this->getModelValue($model->filename);
}
private function loadNemundoAppMailDataMailQueueMailQueuemailQueueRow($model) {
$this->mailQueue = new \Nemundo\App\Mail\Data\MailQueue\MailQueueRow($this->row, $model);
}
}