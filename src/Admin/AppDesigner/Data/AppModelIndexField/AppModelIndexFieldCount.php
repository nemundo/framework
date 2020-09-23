<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelIndexFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexFieldModel();
}
}