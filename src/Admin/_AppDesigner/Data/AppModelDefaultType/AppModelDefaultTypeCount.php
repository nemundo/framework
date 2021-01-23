<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
}