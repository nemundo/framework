<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppModelPrimaryIndexTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $indexType;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->indexType, $this->indexType);
$id = parent::save();
return $id;
}
}