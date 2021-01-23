<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppTextTypeModel();
}
}