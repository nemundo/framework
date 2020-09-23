<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppImageResizeTypeModel();
}
}