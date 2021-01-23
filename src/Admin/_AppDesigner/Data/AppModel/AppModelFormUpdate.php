<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelFormUpdate extends ModelFormUpdate {
/**
* @var AppModelModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelModel();
}
}