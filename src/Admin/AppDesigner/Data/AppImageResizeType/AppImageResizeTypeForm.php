<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppImageResizeTypeModel();
}
}