<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelFieldTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelFieldTypeModel();
}
}