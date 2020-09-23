<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppAutoNumberTypeTable extends BootstrapModelTable {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppAutoNumberTypeModel();
}
}