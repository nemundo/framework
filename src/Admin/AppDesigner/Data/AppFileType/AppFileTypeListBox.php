<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppFileTypeModel();
$this->label = $this->model->label;
}
}