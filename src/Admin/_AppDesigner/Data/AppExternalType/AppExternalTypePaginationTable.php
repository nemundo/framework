<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppExternalTypeModel();
}
}