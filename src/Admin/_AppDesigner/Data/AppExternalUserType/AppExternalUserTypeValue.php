<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppExternalUserTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalUserTypeModel();
}
}