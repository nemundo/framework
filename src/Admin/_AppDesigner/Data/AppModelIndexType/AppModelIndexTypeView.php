<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
use Nemundo\Model\View\ModelView;
class AppModelIndexTypeView extends ModelView {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexTypeModel();
}
}