<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelPrimaryIndexTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelPrimaryIndexTypeModel();
}
}