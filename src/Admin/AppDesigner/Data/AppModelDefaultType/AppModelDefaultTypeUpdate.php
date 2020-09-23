<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelDefaultTypeUpdate extends AbstractModelUpdate {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

/**
* @var string
*/
public $appModelId;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appModelId, $this->appModelId);
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
parent::update();
}
}