<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelFieldTypeModel();
}
}