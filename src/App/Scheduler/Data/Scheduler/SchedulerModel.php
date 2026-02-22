<?php
namespace Nemundo\App\Scheduler\Data\Scheduler;
class SchedulerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $running;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $day;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $hour;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $minute;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $specificStartTime;

/**
* @var \Nemundo\Model\Type\DateTime\TimeType
*/
public $startTime;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

protected function loadModel() {
$this->tableName = "scheduler_scheduler";
$this->aliasTableName = "scheduler_scheduler";
$this->label = "Scheduler";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "scheduler_scheduler";
$this->id->externalTableName = "scheduler_scheduler";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "scheduler_scheduler_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "scheduler_scheduler";
$this->active->externalTableName = "scheduler_scheduler";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "scheduler_scheduler_active";
$this->active->label = "Active";
$this->active->allowNullValue = true;

$this->running = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->running->tableName = "scheduler_scheduler";
$this->running->externalTableName = "scheduler_scheduler";
$this->running->fieldName = "running";
$this->running->aliasFieldName = "scheduler_scheduler_running";
$this->running->label = "Running";
$this->running->allowNullValue = true;

$this->day = new \Nemundo\Model\Type\Number\NumberType($this);
$this->day->tableName = "scheduler_scheduler";
$this->day->externalTableName = "scheduler_scheduler";
$this->day->fieldName = "day";
$this->day->aliasFieldName = "scheduler_scheduler_day";
$this->day->label = "Day";
$this->day->allowNullValue = true;

$this->hour = new \Nemundo\Model\Type\Number\NumberType($this);
$this->hour->tableName = "scheduler_scheduler";
$this->hour->externalTableName = "scheduler_scheduler";
$this->hour->fieldName = "hour";
$this->hour->aliasFieldName = "scheduler_scheduler_hour";
$this->hour->label = "Hour";
$this->hour->allowNullValue = true;

$this->minute = new \Nemundo\Model\Type\Number\NumberType($this);
$this->minute->tableName = "scheduler_scheduler";
$this->minute->externalTableName = "scheduler_scheduler";
$this->minute->fieldName = "minute";
$this->minute->aliasFieldName = "scheduler_scheduler_minute";
$this->minute->label = "Minute";
$this->minute->allowNullValue = true;

$this->specificStartTime = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->specificStartTime->tableName = "scheduler_scheduler";
$this->specificStartTime->externalTableName = "scheduler_scheduler";
$this->specificStartTime->fieldName = "specific_start_time";
$this->specificStartTime->aliasFieldName = "scheduler_scheduler_specific_start_time";
$this->specificStartTime->label = "Specific Start Time";
$this->specificStartTime->allowNullValue = true;

$this->startTime = new \Nemundo\Model\Type\DateTime\TimeType($this);
$this->startTime->tableName = "scheduler_scheduler";
$this->startTime->externalTableName = "scheduler_scheduler";
$this->startTime->fieldName = "start_time";
$this->startTime->aliasFieldName = "scheduler_scheduler_start_time";
$this->startTime->label = "Start Time";
$this->startTime->allowNullValue = true;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "scheduler_scheduler";
$this->setupStatus->externalTableName = "scheduler_scheduler";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "scheduler_scheduler_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "scheduler_scheduler";
$this->phpClass->externalTableName = "scheduler_scheduler";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "scheduler_scheduler_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$this->applicationId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->applicationId->tableName = "scheduler_scheduler";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "scheduler_scheduler_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = true;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "php_class";
$index->addType($this->phpClass);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "scheduler_scheduler_application");
$this->application->tableName = "scheduler_scheduler";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "scheduler_scheduler_application";
$this->application->label = "Application";
}
return $this;
}
}