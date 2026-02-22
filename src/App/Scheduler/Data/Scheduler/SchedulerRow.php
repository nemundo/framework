<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var SchedulerModel
*/
public $model;

/**
* @var string
*/
public $id;

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

/**
* @var \Nemundo\App\Application\Row\ApplicationCustomRow
*/
public $application;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->active = boolval($this->getModelValue($model->active));
$this->running = boolval($this->getModelValue($model->running));
$this->day = intval($this->getModelValue($model->day));
$this->hour = intval($this->getModelValue($model->hour));
$this->minute = intval($this->getModelValue($model->minute));
$this->specificStartTime = boolval($this->getModelValue($model->specificStartTime));
$this->startTime = new \Nemundo\Core\Type\DateTime\Time($this->getModelValue($model->startTime));
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
$this->phpClass = $this->getModelValue($model->phpClass);
$this->applicationId = $this->getModelValue($model->applicationId);
if ($model->application !== null) {
$this->loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model->application);
}
}
private function loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model) {
$this->application = new \Nemundo\App\Application\Row\ApplicationCustomRow($this->row, $model);
}
}