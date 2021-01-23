<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppTextTypeModel();
$this->label = $this->model->label;
}
}