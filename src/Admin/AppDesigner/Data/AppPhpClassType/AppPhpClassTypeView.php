<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
use Nemundo\Model\View\ModelView;
class AppPhpClassTypeView extends ModelView {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppPhpClassTypeModel();
}
}