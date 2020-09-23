<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppImageResizeTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
}