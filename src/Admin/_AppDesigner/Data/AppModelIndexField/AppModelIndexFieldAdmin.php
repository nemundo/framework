<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelIndexFieldModel();
}
}