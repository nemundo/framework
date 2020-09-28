<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelIndexFieldUpdate extends AbstractModelUpdate {
/**
* @var AppModelIndexFieldModel
*/
public $model;

/**
* @var string
*/
public $appIndexId;

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
$this->model = new AppModelIndexFieldModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appIndexId, $this->appIndexId);
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
parent::update();
}
}