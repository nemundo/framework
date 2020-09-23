<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppModelDefaultTypeModel
*/
protected $model;

/**
* @var string
*/
public $appModelId;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appModelId, $this->appModelId);
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}