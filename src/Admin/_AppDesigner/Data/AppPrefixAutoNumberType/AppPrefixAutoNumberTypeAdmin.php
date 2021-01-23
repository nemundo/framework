<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppPrefixAutoNumberTypeModel();
}
}