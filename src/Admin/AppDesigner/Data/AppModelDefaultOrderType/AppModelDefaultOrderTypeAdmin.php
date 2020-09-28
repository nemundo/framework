<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelDefaultOrderTypeModel();
}
}