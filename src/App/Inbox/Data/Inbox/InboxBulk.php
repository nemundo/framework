<?php
namespace Nemundo\App\Inbox\Data\Inbox;
class InboxBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var InboxModel
*/
protected $model;

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

public function __construct() {
parent::__construct();
$this->model = new InboxModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$this->typeValueList->setModelValue($this->model->uid, $this->uid);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
if ($this-> dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$id = parent::save();
return $id;
}
}