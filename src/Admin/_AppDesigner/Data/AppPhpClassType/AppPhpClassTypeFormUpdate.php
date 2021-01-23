<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppPhpClassTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppPhpClassTypeModel();
}
}