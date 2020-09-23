<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppImageTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppImageTypeModel();
}
}