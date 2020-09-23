<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelDefaultTypeModel();
}
}