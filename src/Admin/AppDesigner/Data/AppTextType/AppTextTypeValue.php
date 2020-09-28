<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppTextTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
}