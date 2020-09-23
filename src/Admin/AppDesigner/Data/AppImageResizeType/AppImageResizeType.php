<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppImageResizeTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $resizeType;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->resizeType, $this->resizeType);
$id = parent::save();
return $id;
}
}