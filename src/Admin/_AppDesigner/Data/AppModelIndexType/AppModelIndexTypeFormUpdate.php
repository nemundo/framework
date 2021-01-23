<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelIndexTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexTypeModel();
}
}