<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppTextTypeModel();
}
}