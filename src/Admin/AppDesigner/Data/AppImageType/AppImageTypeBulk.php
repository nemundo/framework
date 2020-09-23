<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppImageTypeModel
*/
protected $model;

/**
* @var string
*/
public $appFieldId;

/**
* @var int
*/
public $size;

/**
* @var string
*/
public $resizeTypeId;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appFieldId, $this->appFieldId);
$this->typeValueList->setModelValue($this->model->size, $this->size);
$this->typeValueList->setModelValue($this->model->resizeTypeId, $this->resizeTypeId);
$id = parent::save();
return $id;
}
}