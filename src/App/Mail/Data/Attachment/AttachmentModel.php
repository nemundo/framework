<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mailQueueId;

/**
* @var \Nemundo\App\Mail\Data\MailQueue\MailQueueExternalType
*/
public $mailQueue;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $filename;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasCustomFilename;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $customFilename;

protected function loadModel() {
$this->tableName = "mail_attachment";
$this->aliasTableName = "mail_attachment";
$this->label = "Attachment";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "mail_attachment";
$this->id->externalTableName = "mail_attachment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "mail_attachment_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->mailQueueId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mailQueueId->tableName = "mail_attachment";
$this->mailQueueId->fieldName = "mail_queue";
$this->mailQueueId->aliasFieldName = "mail_attachment_mail_queue";
$this->mailQueueId->label = "Mail Queue";
$this->mailQueueId->allowNullValue = false;

$this->filename = new \Nemundo\Model\Type\Text\TextType($this);
$this->filename->tableName = "mail_attachment";
$this->filename->externalTableName = "mail_attachment";
$this->filename->fieldName = "filename";
$this->filename->aliasFieldName = "mail_attachment_filename";
$this->filename->label = "Filename";
$this->filename->allowNullValue = false;
$this->filename->length = 255;

$this->hasCustomFilename = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasCustomFilename->tableName = "mail_attachment";
$this->hasCustomFilename->externalTableName = "mail_attachment";
$this->hasCustomFilename->fieldName = "has_custom_filename";
$this->hasCustomFilename->aliasFieldName = "mail_attachment_has_custom_filename";
$this->hasCustomFilename->label = "Has Custom Filename";
$this->hasCustomFilename->allowNullValue = false;

$this->customFilename = new \Nemundo\Model\Type\Text\TextType($this);
$this->customFilename->tableName = "mail_attachment";
$this->customFilename->externalTableName = "mail_attachment";
$this->customFilename->fieldName = "custom_filename";
$this->customFilename->aliasFieldName = "mail_attachment_custom_filename";
$this->customFilename->label = "Custom Filename";
$this->customFilename->allowNullValue = true;
$this->customFilename->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "mail_queue";
$index->addType($this->mailQueueId);

}
public function loadMailQueue() {
if ($this->mailQueue == null) {
$this->mailQueue = new \Nemundo\App\Mail\Data\MailQueue\MailQueueExternalType($this, "mail_attachment_mail_queue");
$this->mailQueue->tableName = "mail_attachment";
$this->mailQueue->fieldName = "mail_queue";
$this->mailQueue->aliasFieldName = "mail_attachment_mail_queue";
$this->mailQueue->label = "Mail Queue";
}
return $this;
}
}