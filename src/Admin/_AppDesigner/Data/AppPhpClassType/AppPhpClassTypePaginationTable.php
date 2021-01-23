<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppPhpClassTypeModel();
}
}