<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelDefaultTypeTable extends BootstrapModelTable {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelDefaultTypeModel();
}
}