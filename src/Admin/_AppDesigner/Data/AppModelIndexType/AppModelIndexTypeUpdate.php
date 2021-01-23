<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelIndexTypeUpdate extends AbstractModelUpdate {
/**
* @var AppModelIndexTypeModel
*/
public $model;

/**
* @var string
*/
public $indexType;

/**
* @var string
*/
public $indexTypeClassName;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->indexType, $this->indexType);
$this->typeValueList->setModelValue($this->model->indexTypeClassName, $this->indexTypeClassName);
parent::update();
}
}