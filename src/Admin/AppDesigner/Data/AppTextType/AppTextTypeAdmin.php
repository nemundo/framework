<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppTextTypeModel();
}
}