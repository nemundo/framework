<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
use Nemundo\Model\View\ModelView;
class AppExternalTypeView extends ModelView {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppExternalTypeModel();
}
}