<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppTemplateModelModel();
}
}