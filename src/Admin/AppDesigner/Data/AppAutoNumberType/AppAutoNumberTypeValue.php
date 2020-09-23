<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
}