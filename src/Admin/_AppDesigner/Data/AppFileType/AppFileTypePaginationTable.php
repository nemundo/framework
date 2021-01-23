<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppFileTypeModel();
}
}