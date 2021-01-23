<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModel();
}
}