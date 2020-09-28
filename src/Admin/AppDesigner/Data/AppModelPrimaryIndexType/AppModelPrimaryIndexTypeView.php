<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
use Nemundo\Model\View\ModelView;
class AppModelPrimaryIndexTypeView extends ModelView {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelPrimaryIndexTypeModel();
}
}