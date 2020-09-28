<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModelFieldModel();
}
}