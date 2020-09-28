<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppPrefixAutoNumberTypeModel();
$this->label = $this->model->label;
}
}