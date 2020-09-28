<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppExternalTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->externalModelId, $this->externalModelId);
$this->typeValueList->setModelValue($this->model->appLoadModel, $this->appLoadModel);
$id = parent::save();
return $id;
}
}