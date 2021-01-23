<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppAutoNumberTypeModel();
}
}