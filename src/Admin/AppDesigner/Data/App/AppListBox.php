<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModel();
$this->label = $this->model->label;
}
}