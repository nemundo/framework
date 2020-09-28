<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelFieldTypeUpdate extends AbstractModelUpdate {
/**
* @var AppModelFieldTypeModel
*/
public $model;

/**
* @var string
*/
public $fieldType;

/**
* @var string
*/
public $fieldClassName;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->fieldType, $this->fieldType);
$this->typeValueList->setModelValue($this->model->fieldClassName, $this->fieldClassName);
parent::update();
}
}