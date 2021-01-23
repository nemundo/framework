<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
}