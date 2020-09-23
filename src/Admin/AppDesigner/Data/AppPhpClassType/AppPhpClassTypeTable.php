<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppPhpClassTypeTable extends BootstrapModelTable {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppPhpClassTypeModel();
}
}