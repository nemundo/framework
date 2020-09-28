<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppModelFieldTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $fieldType;

/**
* @var string
*/
public $fieldClassName;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->fieldType, $this->fieldType);
$this->typeValueList->setModelValue($this->model->fieldClassName, $this->fieldClassName);
$id = parent::save();
return $id;
}
}