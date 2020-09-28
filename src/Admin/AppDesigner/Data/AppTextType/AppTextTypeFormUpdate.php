<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppTextTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppTextTypeModel();
}
}