<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppExternalTypeTable extends BootstrapModelTable {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppExternalTypeModel();
}
}