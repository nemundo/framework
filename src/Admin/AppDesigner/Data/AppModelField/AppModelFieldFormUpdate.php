<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelFieldFormUpdate extends ModelFormUpdate {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelFieldModel();
}
}