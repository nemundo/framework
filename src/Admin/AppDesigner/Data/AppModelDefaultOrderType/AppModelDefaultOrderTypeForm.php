<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelDefaultOrderTypeModel();
}
}