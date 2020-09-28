<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppTemplateModelTable extends BootstrapModelTable {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppTemplateModelModel();
}
}