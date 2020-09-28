<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppPrefixAutoNumberTypeModel();
}
}