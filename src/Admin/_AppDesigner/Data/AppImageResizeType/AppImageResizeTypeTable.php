<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppImageResizeTypeTable extends BootstrapModelTable {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppImageResizeTypeModel();
}
}