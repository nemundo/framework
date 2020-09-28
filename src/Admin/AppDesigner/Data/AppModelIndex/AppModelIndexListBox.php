<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexModel();
$this->label = $this->model->label;
}
}