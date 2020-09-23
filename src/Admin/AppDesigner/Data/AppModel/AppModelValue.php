<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
}