<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppExternalUserTypeModel();
}
}