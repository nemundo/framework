<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppFileTypeUpdate extends AbstractModelUpdate {
/**
* @var AppFileTypeModel
*/
public $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var bool
*/
public $keepOrginalFilename;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->keepOrginalFilename, $this->keepOrginalFilename);
parent::update();
}
}