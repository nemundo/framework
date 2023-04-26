<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $cid;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $filename;

protected function loadModel() {
$this->tableName = "mail_inline_image";
$this->aliasTableName = "mail_inline_image";
$this->label = "Inline Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "mail_inline_image";
$this->id->externalTableName = "mail_inline_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "mail_inline_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->mailQueueId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mailQueueId->tableName = "mail_inline_image";
$this->mailQueueId->fieldName = "mail_queue";
$this->mailQueueId->aliasFieldName = "mail_inline_image_mail_queue";
$this->mailQueueId->label = "Mail Queue";
$this->mailQueueId->allowNullValue = false;

$this->cid = new \Nemundo\Model\Type\Text\TextType($this);
$this->cid->tableName = "mail_inline_image";
$this->cid->externalTableName = "mail_inline_image";
$this->cid->fieldName = "cid";
$this->cid->aliasFieldName = "mail_inline_image_cid";
$this->cid->label = "Cid";
$this->cid->allowNullValue = false;
$this->cid->length = 20;

$this->filename = new \Nemundo\Model\Type\Text\TextType($this);
$this->filename->tableName = "mail_inline_image";
$this->filename->externalTableName = "mail_inline_image";
$this->filename->fieldName = "filename";
$this->filename->aliasFieldName = "mail_inline_image_filename";
$this->filename->label = "Filename";
$this->filename->allowNullValue = false;
$this->filename->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "mail_queue";
$index->addType($this->mailQueueId);

}
public function loadMailQueue() {
if ($this->mailQueue == null) {
$this->mailQueue = new \Nemundo\App\Mail\Data\MailQueue\MailQueueExternalType($this, "mail_inline_image_mail_queue");
$this->mailQueue->tableName = "mail_inline_image";
$this->mailQueue->fieldName = "mail_queue";
$this->mailQueue->aliasFieldName = "mail_inline_image_mail_queue";
$this->mailQueue->label = "Mail Queue";
}
return $this;
}
}