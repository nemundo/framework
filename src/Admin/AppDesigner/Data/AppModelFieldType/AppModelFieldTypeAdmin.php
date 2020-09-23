<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelFieldTypeModel();
}
}