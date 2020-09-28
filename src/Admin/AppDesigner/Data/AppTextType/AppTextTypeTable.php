<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppTextTypeTable extends BootstrapModelTable {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppTextTypeModel();
}
}