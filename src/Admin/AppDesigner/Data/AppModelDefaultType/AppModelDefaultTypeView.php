<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
use Nemundo\Model\View\ModelView;
class AppModelDefaultTypeView extends ModelView {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelDefaultTypeModel();
}
}