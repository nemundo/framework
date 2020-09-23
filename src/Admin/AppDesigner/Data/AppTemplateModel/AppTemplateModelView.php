<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
use Nemundo\Model\View\ModelView;
class AppTemplateModelView extends ModelView {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppTemplateModelModel();
}
}