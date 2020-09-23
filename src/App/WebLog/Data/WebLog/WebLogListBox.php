<?php
namespace Nemundo\App\WebLog\Data\WebLog;
class WebLogListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WebLogModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new WebLogModel();
$this->label = $this->model->label;
}
}