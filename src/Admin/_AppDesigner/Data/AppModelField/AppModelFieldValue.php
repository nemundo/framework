<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
}