<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelModel();
}
}