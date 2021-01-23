<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexModel();
}
}