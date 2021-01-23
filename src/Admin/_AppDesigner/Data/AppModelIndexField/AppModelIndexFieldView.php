<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
use Nemundo\Model\View\ModelView;
class AppModelIndexFieldView extends ModelView {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexFieldModel();
}
}