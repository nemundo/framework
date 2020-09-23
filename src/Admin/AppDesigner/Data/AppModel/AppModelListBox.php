<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelModel();
$this->label = $this->model->label;
}
}