<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppImageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
}