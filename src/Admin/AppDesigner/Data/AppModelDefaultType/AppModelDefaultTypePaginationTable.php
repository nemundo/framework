<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelDefaultTypeModel();
}
}