<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppTextTypeModel
*/
protected $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $length;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->length, $this->length);
$id = parent::save();
return $id;
}
}