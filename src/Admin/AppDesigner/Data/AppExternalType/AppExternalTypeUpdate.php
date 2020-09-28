<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppExternalTypeUpdate extends AbstractModelUpdate {
/**
* @var AppExternalTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var string
*/
public $externalModelId;

/**
* @var bool
*/
public $appLoadModel;

public function __construct() {
parent::__construct();
$this->model = new AppExternalTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->externalModelId, $this->externalModelId);
$this->typeValueList->setModelValue($this->model->appLoadModel, $this->appLoadModel);
parent::update();
}
}