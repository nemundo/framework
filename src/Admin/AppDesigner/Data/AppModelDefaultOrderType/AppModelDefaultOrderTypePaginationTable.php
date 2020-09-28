<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelDefaultOrderTypeModel();
}
}