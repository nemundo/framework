<?php
namespace Nemundo\App\Scheduler\Data\Job;
class JobExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $scriptId;

/**
* @var \Nemundo\App\Script\Data\Script\ScriptExternalType
*/
public $script;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $finished;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $duration;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = JobModel::class;
$this->externalTableName = "scheduler_job";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->scriptId = new \Nemundo\Model\Type\Id\IdType();
$this->scriptId->fieldName = "script";
$this->scriptId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->scriptId->aliasFieldName = $this->scriptId->tableName ."_".$this->scriptId->fieldName;
$this->scriptId->label = "Script";
$this->addType($this->scriptId);

$this->finished = new \Nemundo\Model\Type\Number\YesNoType();
$this->finished->fieldName = "finished";
$this->finished->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->finished->aliasFieldName = $this->finished->tableName . "_" . $this->finished->fieldName;
$this->finished->label = "Finished";
$this->addType($this->finished);

$this->duration = new \Nemundo\Model\Type\Number\NumberType();
$this->duration->fieldName = "duration";
$this->duration->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->duration->aliasFieldName = $this->duration->tableName . "_" . $this->duration->fieldName;
$this->duration->label = "Duration";
$this->addType($this->duration);

}
public function loadScript() {
if ($this->script == null) {
$this->script = new \Nemundo\App\Script\Data\Script\ScriptExternalType(null, $this->parentFieldName . "_script");
$this->script->fieldName = "script";
$this->script->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->script->aliasFieldName = $this->script->tableName ."_".$this->script->fieldName;
$this->script->label = "Script";
$this->addType($this->script);
}
return $this;
}
}