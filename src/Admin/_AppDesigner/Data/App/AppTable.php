<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AppTable extends BootstrapModelTable {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModel();
}
}