<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppPhpClassTypeModel();
}
}