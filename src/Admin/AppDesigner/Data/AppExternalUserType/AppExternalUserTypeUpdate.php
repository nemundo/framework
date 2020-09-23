<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppExternalUserTypeUpdate extends AbstractModelUpdate {
/**
* @var AppExternalUserTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var bool
*/
public $appLoadModel;

public function __construct() {
parent::__construct();
$this->model = new AppExternalUserTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->appLoadModel, $this->appLoadModel);
parent::update();
}
}