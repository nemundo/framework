<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppImageResizeTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppImageResizeTypeModel();
}
}