<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
use Nemundo\Model\View\ModelView;
class AppFileTypeView extends ModelView {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppFileTypeModel();
}
}