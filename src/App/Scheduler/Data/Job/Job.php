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

public function __construct() {
parent::__construct();
$this->model = new JobModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->scriptId, $this->scriptId);
$this->typeValueList->setModelValue($this->model->finished, $this->finished);
$this->typeValueList->setModelValue($this->model->duration, $this->duration);
$id = parent::save();
return $id;
}
}