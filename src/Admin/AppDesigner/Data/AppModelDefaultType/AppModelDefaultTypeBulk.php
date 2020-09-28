<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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