<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppTemplateModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTemplateModelModel();
}
}