<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelDefaultOrderTypeUpdate extends AbstractModelUpdate {
/**
* @var AppModelDefaultOrderTypeModel
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
$this->model = new AppModelDefaultOrderTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appModelId, $this->appModelId);
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
parent::update();
}
}