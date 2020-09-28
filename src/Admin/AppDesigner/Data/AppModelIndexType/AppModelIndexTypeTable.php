<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelIndexTypeTable extends BootstrapModelTable {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexTypeModel();
}
}