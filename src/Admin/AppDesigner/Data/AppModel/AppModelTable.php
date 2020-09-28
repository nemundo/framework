<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelTable extends BootstrapModelTable {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelModel();
}
}