<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppAutoNumberTypeModel();
}
}