<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppModelIndexModel
*/
protected $model;

/**
* @var string
*/
public $appModelId;

/**
* @var string
*/
public $indexTypeId;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->appModelId, $this->appModelId);
$this->typeValueList->setModelValue($this->model->indexTypeId, $this->indexTypeId);
$id = parent::save();
return $id;
}
}