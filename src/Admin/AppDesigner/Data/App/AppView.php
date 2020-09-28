<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
use Nemundo\Model\View\ModelView;
class AppView extends ModelView {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AppModel();
}
}