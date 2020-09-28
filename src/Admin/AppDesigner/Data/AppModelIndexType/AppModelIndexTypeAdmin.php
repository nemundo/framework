<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelIndexTypeModel();
}
}