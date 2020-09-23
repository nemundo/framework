<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelModel();
}
}