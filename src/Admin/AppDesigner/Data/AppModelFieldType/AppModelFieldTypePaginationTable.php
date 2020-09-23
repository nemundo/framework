<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelFieldTypeModel();
}
}