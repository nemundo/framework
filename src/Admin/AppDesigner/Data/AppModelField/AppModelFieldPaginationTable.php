<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelFieldModel();
}
}