<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexFieldModel();
$this->label = $this->model->label;
}
}