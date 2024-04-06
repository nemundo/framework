<?php
namespace Nemundo\App\Mail\Data\Attachment;
class AttachmentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AttachmentModel::class;
$this->externalTableName = "mail_attachment";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->mailQueueId = new \Nemundo\Model\Type\Id\IdType();
$this->mailQueueId->fieldName = "mail_queue";
$this->mailQueueId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailQueueId->aliasFieldName = $this->mailQueueId->tableName ."_".$this->mailQueueId->fieldName;
$this->mailQueueId->label = "Mail Queue";
$this->addType($this->mailQueueId);

$this->filename = new \Nemundo\Model\Type\Text\TextType();
$this->filename->fieldName = "filename";
$this->filename->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->filename->externalTableName = $this->externalTableName;
$this->filename->aliasFieldName = $this->filename->tableName . "_" . $this->filename->fieldName;
$this->filename->label = "Filename";
$this->addType($this->filename);

}
public function loadMailQueue() {
if ($this->mailQueue == null) {
$this->mailQueue = new \Nemundo\App\Mail\Data\MailQueue\MailQueueExternalType(null, $this->parentFieldName . "_mail_queue");
$this->mailQueue->fieldName = "mail_queue";
$this->mailQueue->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mailQueue->aliasFieldName = $this->mailQueue->tableName ."_".$this->mailQueue->fieldName;
$this->mailQueue->label = "Mail Queue";
$this->addType($this->mailQueue);
}
return $this;
}
}