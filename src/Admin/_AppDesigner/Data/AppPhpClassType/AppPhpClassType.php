<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppPhpClassTypeModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->phpClassName, $this->phpClassName);
$id = parent::save();
return $id;
}
}