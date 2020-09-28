<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppExternalTypeModel();
}
}