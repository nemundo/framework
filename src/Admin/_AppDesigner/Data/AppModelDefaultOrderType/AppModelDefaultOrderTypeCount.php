<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultOrderTypeModel();
}
}