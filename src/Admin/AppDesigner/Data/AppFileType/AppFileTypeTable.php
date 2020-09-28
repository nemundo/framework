<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppFileTypeTable extends BootstrapModelTable {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppFileTypeModel();
}
}