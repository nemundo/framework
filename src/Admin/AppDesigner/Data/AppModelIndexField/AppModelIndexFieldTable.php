<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelIndexFieldTable extends BootstrapModelTable {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexFieldModel();
}
}