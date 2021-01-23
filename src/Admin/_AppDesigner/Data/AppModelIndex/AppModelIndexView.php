<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
use Nemundo\Model\View\ModelView;
class AppModelIndexView extends ModelView {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModelIndexModel();
}
}