<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppTemplateModelModel();
}
}