<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
}