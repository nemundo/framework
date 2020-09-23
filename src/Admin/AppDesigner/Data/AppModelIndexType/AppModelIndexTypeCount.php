<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
}