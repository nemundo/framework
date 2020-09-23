<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppTemplateModelModel();
$this->label = $this->model->label;
}
}