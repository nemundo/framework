<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppExternalUserTypeModel();
$this->label = $this->model->label;
}
}