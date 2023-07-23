<?php
namespace Nemundo\App\Scheduler\Data\Job;
class Job extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var JobModel
*/
protected $model;

/**
* @var string
*/
public $scriptId;

/**
* @var bool
*/
public $finished;

/**
* @var int
*/
public $duration;

/**
* @var string
*/
public $statusId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $finishedDateTime;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
$this->finishedDateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$this->typeValueList->setModelValue($this->model->scriptId, $this->scriptId);
$this->typeValueList->setModelValue($this->model->finished, $this->finished);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
if ($this-> finishedDateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->finishedDateTime, $this->typeValueList);
$property->setValue($this->finishedDateTime);
}
$id = parent::save();
return $id;
}
}