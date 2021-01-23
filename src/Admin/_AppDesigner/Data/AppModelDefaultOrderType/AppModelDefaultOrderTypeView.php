<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
use Nemundo\Model\View\ModelView;
class AppModelDefaultOrderTypeView extends ModelView {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelDefaultOrderTypeModel();
}
}