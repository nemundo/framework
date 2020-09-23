<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelPrimaryIndexTypeModel();
}
}