<?php
namespace Nemundo\App\Inbox\Data\Inbox;
class InboxModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uid;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "inbox_inbox";
$this->aliasTableName = "inbox_inbox";
$this->label = "Inbox";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "inbox_inbox";
$this->id->externalTableName = "inbox_inbox";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "inbox_inbox_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->uid = new \Nemundo\Model\Type\Text\TextType($this);
$this->uid->tableName = "inbox_inbox";
$this->uid->externalTableName = "inbox_inbox";
$this->uid->fieldName = "uid";
$this->uid->aliasFieldName = "inbox_inbox_uid";
$this->uid->label = "Uid";
$this->uid->allowNullValue = false;
$this->uid->length = 255;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "inbox_inbox";
$this->subject->externalTableName = "inbox_inbox";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "inbox_inbox_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = false;
$this->subject->length = 255;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "inbox_inbox";
$this->dateTime->externalTableName = "inbox_inbox";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "inbox_inbox_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "uid";
$index->addType($this->uid);

}
}