<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppExternalUserTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppExternalUserTypeModel();
}
}