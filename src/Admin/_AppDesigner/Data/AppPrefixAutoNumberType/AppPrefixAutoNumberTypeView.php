<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
use Nemundo\Model\View\ModelView;
class AppPrefixAutoNumberTypeView extends ModelView {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppPrefixAutoNumberTypeModel();
}
}