<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppPhpClassTypeModel();
}
}