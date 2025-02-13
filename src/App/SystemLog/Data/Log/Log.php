<?php
namespace Nemundo\App\SystemLog\Data\Log;
class Log extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LogModel
*/
protected $model;

/**
* @var string
*/
public $applicationId;

/**
* @var string
*/
public $logTypeId;

/**
* @var string
*/
public $message;

/**
* @var bool
*/
public $sendMail;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->logTypeId, $this->logTypeId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$this->typeValueList->setModelValue($this->model->sendMail, $this->sendMail);
$id = parent::save();
return $id;
}
}