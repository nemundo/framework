<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelPrimaryIndexTypeTable extends BootstrapModelTable {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelPrimaryIndexTypeModel();
}
}