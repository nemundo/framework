<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
use Nemundo\Model\View\ModelView;
class AppTextTypeView extends ModelView {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppTextTypeModel();
}
}