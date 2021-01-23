<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppImageTypeModel();
$this->label = $this->model->label;
}
}