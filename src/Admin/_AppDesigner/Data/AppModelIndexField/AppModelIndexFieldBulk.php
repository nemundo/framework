<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppModelIndexFieldModel
*/
protected $model;

/**
* @var string
*/
public $appIndexId;

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
$this->model = new AppModelIndexFieldModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appIndexId, $this->appIndexId);
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}