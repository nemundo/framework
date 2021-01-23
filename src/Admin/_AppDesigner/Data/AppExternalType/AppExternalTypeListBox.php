<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppExternalTypeModel();
$this->label = $this->model->label;
}
}