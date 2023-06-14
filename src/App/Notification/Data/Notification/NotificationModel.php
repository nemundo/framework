<?php
namespace Nemundo\App\Notification\Data\Notification;
class NotificationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

protected function loadModel() {
$this->tableName = "notification_notification";
$this->aliasTableName = "notification_notification";
$this->label = "Notification";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "notification_notification";
$this->id->externalTableName = "notification_notification";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "notification_notification_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userId->tableName = "notification_notification";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "notification_notification_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "notification_notification";
$this->dateTime->externalTableName = "notification_notification";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "notification_notification_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->message = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->message->tableName = "notification_notification";
$this->message->externalTableName = "notification_notification";
$this->message->fieldName = "message";
$this->message->aliasFieldName = "notification_notification_message";
$this->message->label = "Message";
$this->message->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "user";
$index->addType($this->userId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "notification_notification_user");
$this->user->tableName = "notification_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "notification_notification_user";
$this->user->label = "User";
}
return $this;
}
}