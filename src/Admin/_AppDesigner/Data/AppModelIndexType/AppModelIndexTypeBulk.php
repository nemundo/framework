<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppModelIndexTypeModel
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

/**
* @var string
*/
public $indexTypeClassName;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->indexType, $this->indexType);
$this->typeValueList->setModelValue($this->model->indexTypeClassName, $this->indexTypeClassName);
$id = parent::save();
return $id;
}
}