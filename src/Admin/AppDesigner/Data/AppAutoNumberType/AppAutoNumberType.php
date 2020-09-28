<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppAutoNumberTypeModel
*/
protected $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $startNumber;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->startNumber, $this->startNumber);
$id = parent::save();
return $id;
}
}