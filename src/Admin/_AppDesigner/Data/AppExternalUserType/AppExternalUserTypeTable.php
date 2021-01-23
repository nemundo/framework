<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppExternalUserTypeTable extends BootstrapModelTable {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppExternalUserTypeModel();
}
}