<?php
namespace Nemundo\App\WebLog\Data\WebLog;
class WebLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Web\UrlType
*/
public $url;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $ipAddress;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $userAgent;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WebLogModel::class;
$this->externalTableName = "weblog_weblog";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->url = new \Nemundo\Model\Type\Web\UrlType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->ipAddress = new \Nemundo\Model\Type\Text\TextType();
$this->ipAddress->fieldName = "ip_address";
$this->ipAddress->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->ipAddress->aliasFieldName = $this->ipAddress->tableName . "_" . $this->ipAddress->fieldName;
$this->ipAddress->label = "IP Address";
$this->addType($this->ipAddress);

$this->userAgent = new \Nemundo\Model\Type\Text\TextType();
$this->userAgent->fieldName = "user_agent";
$this->userAgent->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userAgent->aliasFieldName = $this->userAgent->tableName . "_" . $this->userAgent->fieldName;
$this->userAgent->label = "User Agent";
$this->addType($this->userAgent);

}
}