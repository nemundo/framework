<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppExternalUserTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->appLoadModel, $this->appLoadModel);
$id = parent::save();
return $id;
}
}