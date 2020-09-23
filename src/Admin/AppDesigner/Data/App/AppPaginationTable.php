<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModel();
}
}