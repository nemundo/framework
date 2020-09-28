<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelFieldModel();
}
}