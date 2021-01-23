<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppImageTypeTable extends BootstrapModelTable {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppImageTypeModel();
}
}