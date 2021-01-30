<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SourceTypeModel
*/
protected $model;

/**
* @var string
*/
public $sourceType;

/**
* @var string
*/
public $phpClass;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->sourceType, $this->sourceType);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$id = parent::save();
return $id;
}
}