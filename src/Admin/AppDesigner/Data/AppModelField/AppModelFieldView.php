<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
use Nemundo\Model\View\ModelView;
class AppModelFieldView extends ModelView {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelFieldModel();
}
}