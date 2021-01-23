<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppPhpClassTypeModel();
$this->label = $this->model->label;
}
}