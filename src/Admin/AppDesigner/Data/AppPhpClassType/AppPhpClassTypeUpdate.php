<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppPhpClassTypeUpdate extends AbstractModelUpdate {
/**
* @var AppPhpClassTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var string
*/
public $phpClassName;

public function __construct() {
parent::__construct();
$this->model = new AppPhpClassTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->phpClassName, $this->phpClassName);
parent::update();
}
}