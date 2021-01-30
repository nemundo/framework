<?php
namespace Nemundo\App\Translation\Data\SourceType;
use Nemundo\Model\Data\AbstractModelUpdate;
class SourceTypeUpdate extends AbstractModelUpdate {
/**
* @var SourceTypeModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->sourceType, $this->sourceType);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
parent::update();
}
}