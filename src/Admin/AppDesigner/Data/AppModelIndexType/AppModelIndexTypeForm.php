<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexTypeModel();
}
}