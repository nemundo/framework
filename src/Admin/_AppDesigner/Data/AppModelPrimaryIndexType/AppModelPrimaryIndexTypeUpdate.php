<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelPrimaryIndexTypeUpdate extends AbstractModelUpdate {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

/**
* @var string
*/
public $indexType;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->indexType, $this->indexType);
parent::update();
}
}