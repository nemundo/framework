<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppTemplateModelModel();
}
}