<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppImageTypeUpdate extends AbstractModelUpdate {
/**
* @var AppImageTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $size;

/**
* @var string
*/
public $resizeTypeId;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->size, $this->size);
$this->typeValueList->setModelValue($this->model->resizeTypeId, $this->resizeTypeId);
parent::update();
}
}