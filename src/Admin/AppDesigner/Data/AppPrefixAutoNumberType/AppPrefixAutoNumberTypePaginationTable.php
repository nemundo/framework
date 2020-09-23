<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppPrefixAutoNumberTypeModel();
}
}