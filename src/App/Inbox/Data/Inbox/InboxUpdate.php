<?php
namespace Nemundo\App\Inbox\Data\Inbox;
use Nemundo\Model\Data\AbstractModelUpdate;
class InboxUpdate extends AbstractModelUpdate {
/**
* @var InboxModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->uid, $this->uid);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
if ($this-> dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
parent::update();
}
}