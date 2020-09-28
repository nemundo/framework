<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModelFieldTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
}