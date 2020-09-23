<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelIndexTable extends BootstrapModelTable {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexModel();
}
}