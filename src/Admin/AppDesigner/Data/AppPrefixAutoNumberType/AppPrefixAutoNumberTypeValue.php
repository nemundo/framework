<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPrefixAutoNumberTypeModel();
}
}