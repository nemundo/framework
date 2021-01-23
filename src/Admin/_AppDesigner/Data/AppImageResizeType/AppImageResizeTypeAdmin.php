<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppImageResizeTypeModel();
}
}