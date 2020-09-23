<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppAutoNumberTypeUpdate extends AbstractModelUpdate {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $startNumber;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->startNumber, $this->startNumber);
parent::update();
}
}