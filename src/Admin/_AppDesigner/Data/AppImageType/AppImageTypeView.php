<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
use Nemundo\Model\View\ModelView;
class AppImageTypeView extends ModelView {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppImageTypeModel();
}
}