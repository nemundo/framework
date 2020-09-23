<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppPhpClassTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPhpClassTypeModel();
}
}