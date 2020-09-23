<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelIndexUpdate extends AbstractModelUpdate {
/**
* @var AppModelIndexModel
*/
public $model;

/**
* @var string
*/
public $appModelId;

/**
* @var string
*/
public $indexTypeId;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appModelId, $this->appModelId);
$this->typeValueList->setModelValue($this->model->indexTypeId, $this->indexTypeId);
parent::update();
}
}