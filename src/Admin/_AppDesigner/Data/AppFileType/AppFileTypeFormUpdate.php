<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppFileTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppFileTypeModel();
}
}