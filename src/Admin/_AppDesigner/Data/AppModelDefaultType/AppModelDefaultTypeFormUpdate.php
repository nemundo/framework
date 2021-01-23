<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelDefaultTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelDefaultTypeModel();
}
}