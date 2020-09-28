<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexTypeModel();
$this->label = $this->model->label;
}
}