<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
use Nemundo\Model\View\ModelView;
class AppExternalUserTypeView extends ModelView {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppExternalUserTypeModel();
}
}