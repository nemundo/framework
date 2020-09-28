<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelDefaultTypeModel();
}
}