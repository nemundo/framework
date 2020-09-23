<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
use Nemundo\Model\View\ModelView;
class AppModelFieldTypeView extends ModelView {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelFieldTypeModel();
}
}