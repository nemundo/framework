<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
use Nemundo\Model\View\ModelView;
class AppModelView extends ModelView {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelModel();
}
}