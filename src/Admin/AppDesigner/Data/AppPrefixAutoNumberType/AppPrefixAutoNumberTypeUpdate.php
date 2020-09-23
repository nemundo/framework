<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppPrefixAutoNumberTypeUpdate extends AbstractModelUpdate {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var string
*/
public $prefix;

/**
* @var int
*/
public $startNumber;

public function __construct() {
parent::__construct();
$this->model = new AppPrefixAutoNumberTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->prefix, $this->prefix);
$this->typeValueList->setModelValue($this->model->startNumber, $this->startNumber);
parent::update();
}
}