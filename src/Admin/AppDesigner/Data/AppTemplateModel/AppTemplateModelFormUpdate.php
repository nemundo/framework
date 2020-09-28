<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
use Nemundo\Model\Form\ModelFormUpdate;
class AppTemplateModelFormUpdate extends ModelFormUpdate {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppTemplateModelModel();
}
}