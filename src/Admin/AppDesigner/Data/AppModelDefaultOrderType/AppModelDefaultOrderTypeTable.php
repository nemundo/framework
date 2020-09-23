<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelDefaultOrderTypeTable extends BootstrapModelTable {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelDefaultOrderTypeModel();
}
}