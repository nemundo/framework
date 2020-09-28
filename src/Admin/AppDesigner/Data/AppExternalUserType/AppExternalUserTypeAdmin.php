<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppExternalUserTypeModel();
}
}