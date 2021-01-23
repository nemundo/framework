<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppExternalTypeModel();
}
}