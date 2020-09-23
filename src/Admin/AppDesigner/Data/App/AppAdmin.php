<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  AppModel();
}
}