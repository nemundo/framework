<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppImageTypeModel();
}
}