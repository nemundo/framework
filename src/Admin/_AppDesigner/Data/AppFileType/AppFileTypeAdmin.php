<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppFileTypeModel();
}
}