<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexModel();
}
}