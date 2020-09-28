<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppAutoNumberTypeModel();
}
}