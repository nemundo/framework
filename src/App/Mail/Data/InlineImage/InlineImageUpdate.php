<?php
namespace Nemundo\App\Mail\Data\InlineImage;
use Nemundo\Model\Data\AbstractModelUpdate;
class InlineImageUpdate extends AbstractModelUpdate {
/**
* @var InlineImageModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->mailQueueId, $this->mailQueueId);
$this->typeValueList->setModelValue($this->model->cid, $this->cid);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
parent::update();
}
}