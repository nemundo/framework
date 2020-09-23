<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
use Nemundo\Model\View\ModelView;
class AppImageResizeTypeView extends ModelView {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppImageResizeTypeModel();
}
}