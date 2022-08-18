<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueName;

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

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "webservice_service_request";
$this->aliasTableName = "webservice_service_request";
$this->label = "Service Request";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webservice_service_request";
$this->id->externalTableName = "webservice_service_request";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webservice_service_request_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->uniqueName = new \Nemundo\Model\Type\Text\TextType($this);
$this->uniqueName->tableName = "webservice_service_request";
$this->uniqueName->externalTableName = "webservice_service_request";
$this->uniqueName->fieldName = "unique_name";
$this->uniqueName->aliasFieldName = "webservice_service_request_unique_name";
$this->uniqueName->label = "Unique Name";
$this->uniqueName->allowNullValue = false;
$this->uniqueName->length = 50;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "webservice_service_request";
$this->phpClass->externalTableName = "webservice_service_request";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "webservice_service_request_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$this->applicationId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->applicationId->tableName = "webservice_service_request";
$this->applicationId->fieldName = "application";
$this->applicationId->aliasFieldName = "webservice_service_request_application";
$this->applicationId->label = "Application";
$this->applicationId->allowNullValue = true;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "webservice_service_request";
$this->setupStatus->externalTableName = "webservice_service_request";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "webservice_service_request_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "unique_name";
$index->addType($this->uniqueName);

}
public function loadApplication() {
if ($this->application == null) {
$this->application = new \Nemundo\App\Application\Data\Application\ApplicationExternalType($this, "webservice_service_request_application");
$this->application->tableName = "webservice_service_request";
$this->application->fieldName = "application";
$this->application->aliasFieldName = "webservice_service_request_application";
$this->application->label = "Application";
}
return $this;
}
}