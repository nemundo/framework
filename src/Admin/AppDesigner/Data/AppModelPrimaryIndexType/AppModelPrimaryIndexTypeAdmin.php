<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelPrimaryIndexTypeModel();
}
}