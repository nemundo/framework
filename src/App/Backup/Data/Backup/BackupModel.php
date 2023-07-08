<?php
namespace Nemundo\App\Backup\Data\Backup;
class BackupModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $applicationId;

/**
* @var \Nemundo\App\Application\Data\Application\ApplicationExternalType
*/
public $application;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $filename;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "backup_backup";
$this->aliasTableName = "backup_backup";
$this->label = "Backup";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "backup_backup";
$this->id->externalTableName = "backup_backup";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "backup_backup_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->applicationId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->applicationId->tableName = "backup_backup";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "backup_backup_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = false;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "backup_backup";
$this->phpClass->externalTableName = "backup_backup";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "backup_backup_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$this->filename = new \Nemundo\Model\Type\Text\TextType($this);
$this->filename->tableName = "backup_backup";
$this->filename->externalTableName = "backup_backup";
$this->filename->fieldName = "filename";
$this->filename->aliasFieldName = "backup_backup_filename";
$this->filename->label = "Filename";
$this->filename->allowNullValue = false;
$this->filename->length = 255;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "backup_backup";
$this->setupStatus->externalTableName = "backup_backup";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "backup_backup_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "php_class";
$index->addType($this->phpClass);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "backup_backup_application");
$this->application->tableName = "backup_backup";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "backup_backup_application";
$this->application->label = "Application";
}
return $this;
}
}