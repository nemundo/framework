<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexFieldModel();
}
}