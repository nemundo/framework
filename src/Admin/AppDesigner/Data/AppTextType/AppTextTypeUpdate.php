<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppTextTypeUpdate extends AbstractModelUpdate {
/**
* @var AppTextTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $length;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->length, $this->length);
parent::update();
}
}