<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppImageResizeTypeUpdate extends AbstractModelUpdate {
/**
* @var AppImageResizeTypeModel
*/
public $model;

/**
* @var string
*/
public $resizeType;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->resizeType, $this->resizeType);
parent::update();
}
}