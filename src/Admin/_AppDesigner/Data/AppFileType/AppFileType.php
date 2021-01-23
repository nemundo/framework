<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppFileTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->keepOrginalFilename, $this->keepOrginalFilename);
$id = parent::save();
return $id;
}
}