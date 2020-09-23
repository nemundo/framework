<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppAutoNumberTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppAutoNumberTypeModel();
}
}