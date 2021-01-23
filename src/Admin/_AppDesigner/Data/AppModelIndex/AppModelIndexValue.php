<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
}