<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppPrefixAutoNumberTypeTable extends BootstrapModelTable {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppPrefixAutoNumberTypeModel();
}
}