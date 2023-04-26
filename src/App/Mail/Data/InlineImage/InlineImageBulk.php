<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var InlineImageModel
*/
protected $model;

/**
* @var string
*/
public $mailQueueId;

/**
* @var string
*/
public $cid;

/**
* @var string
*/
public $filename;

public function __construct() {
parent::__construct();
$this->model = new InlineImageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->mailQueueId, $this->mailQueueId);
$this->typeValueList->setModelValue($this->model->cid, $this->cid);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$id = parent::save();
return $id;
}
}