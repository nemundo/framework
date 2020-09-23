<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppExternalTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalTypeModel();
}
}