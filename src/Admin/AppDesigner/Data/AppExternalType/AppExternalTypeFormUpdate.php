<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppExternalTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppExternalTypeModel();
}
}