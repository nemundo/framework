<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppExternalUserTypeModel();
}
}