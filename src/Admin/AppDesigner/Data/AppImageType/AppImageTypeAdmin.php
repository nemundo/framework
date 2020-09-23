<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppImageTypeModel();
}
}