<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelIndexFieldFormUpdate extends ModelFormUpdate {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexFieldModel();
}
}