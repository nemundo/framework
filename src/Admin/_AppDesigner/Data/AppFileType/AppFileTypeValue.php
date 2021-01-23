<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppFileTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
}