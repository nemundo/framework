<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppImageTypeModel();
}
}