<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
use Nemundo\Model\Form\ModelFormUpdate;
class AppModelIndexFormUpdate extends ModelFormUpdate {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModelIndexModel();
}
}