<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelIndexModel();
}
}