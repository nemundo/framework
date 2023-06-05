<?php
namespace Nemundo\App\Inbox\Data\Inbox;
class InboxRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var InboxModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $uid;

/**
* @var string
*/
public $subject;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->uid = $this->getModelValue($model->uid);
$this->subject = $this->getModelValue($model->subject);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
}