<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppModelFieldTypeTable extends BootstrapModelTable {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelFieldTypeModel();
}
}