<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppFileTypeModel();
}
}