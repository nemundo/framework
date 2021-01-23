<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
use Nemundo\Model\View\ModelView;
class AppAutoNumberTypeView extends ModelView {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppAutoNumberTypeModel();
}
}