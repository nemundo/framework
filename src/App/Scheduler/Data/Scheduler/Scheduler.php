<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class Scheduler extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SchedulerModel
*/
protected $model;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $running;

/**
* @var int
*/
public $day;

/**
* @var int
*/
public $hour;

/**
* @var int
*/
public $minute;

/**
* @var bool
*/
public $specificStartTime;

/**
* @var \Nemundo\Core\Type\DateTime\Time
*/
public $startTime;

/**
* @var bool
*/
public $setupStatus;

/**
* @var string
*/
public $phpClass;

/**
* @var string
*/
public $applicationId;

public function __construct() {
parent::__construct();
$this->model = new SchedulerModel();
$this->startTime = new \Nemundo\Core\Type\DateTime\Time();
}
public function save() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->running, $this->running);
$this->typeValueList->setModelValue($this->model->day, $this->day);
$this->typeValueList->setModelValue($this->model->hour, $this->hour);
$this->typeValueList->setModelValue($this->model->minute, $this->minute);
$this->typeValueList->setModelValue($this->model->specificStartTime, $this->specificStartTime);
if ($this->startTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\TimeDataProperty($this->model->startTime, $this->typeValueList);
$property->setValue($this->startTime);
}
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$id = parent::save();
return $id;
}
}