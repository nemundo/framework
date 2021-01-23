<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultOrderTypeModel();
}
}