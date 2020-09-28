<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppImageResizeTypeModel();
$this->label = $this->model->label;
}
}