<?php
namespace Nemundo\App\WebLog\Data\WebLog;
class WebLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "weblog_weblog";
$this->aliasTableName = "weblog_weblog";
$this->label = "WebLog";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "weblog_weblog";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "weblog_weblog_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->url = new \Nemundo\Model\Type\Web\UrlType($this);
$this->url->tableName = "weblog_weblog";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "weblog_weblog_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "weblog_weblog";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "weblog_weblog_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;
$this->dateTime->visible->form = false;

$this->ipAddress = new \Nemundo\Model\Type\Text\TextType($this);
$this->ipAddress->tableName = "weblog_weblog";
$this->ipAddress->fieldName = "ip_address";
$this->ipAddress->aliasFieldName = "weblog_weblog_ip_address";
$this->ipAddress->label = "IP Address";
$this->ipAddress->allowNullValue = false;
$this->ipAddress->length = 50;

$this->userAgent = new \Nemundo\Model\Type\Text\TextType($this);
$this->userAgent->tableName = "weblog_weblog";
$this->userAgent->fieldName = "user_agent";
$this->userAgent->aliasFieldName = "weblog_weblog_user_agent";
$this->userAgent->label = "User Agent";
$this->userAgent->allowNullValue = false;
$this->userAgent->length = 255;

}
}