<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelIndexFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexFieldModel();
}
}