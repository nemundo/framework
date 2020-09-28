<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppPrefixAutoNumberTypeModel
*/
protected $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var string
*/
public $prefix;

/**
* @var int
*/
public $startNumber;

public function __construct() {
parent::__construct();
$this->model = new AppPrefixAutoNumberTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->prefix, $this->prefix);
$this->typeValueList->setModelValue($this->model->startNumber, $this->startNumber);
$id = parent::save();
return $id;
}
}