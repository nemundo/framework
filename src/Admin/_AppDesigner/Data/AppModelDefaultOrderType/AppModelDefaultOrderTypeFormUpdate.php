<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelDefaultOrderTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelDefaultOrderTypeModel();
}
}