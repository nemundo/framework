<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelFieldModel();
$this->label = $this->model->label;
}
}