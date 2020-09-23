<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexFieldModel();
}
}