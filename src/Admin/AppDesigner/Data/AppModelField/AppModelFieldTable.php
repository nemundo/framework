<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelFieldTable extends BootstrapModelTable {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelFieldModel();
}
}