<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelModel();
}
}