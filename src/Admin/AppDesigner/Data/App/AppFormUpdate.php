<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
use Nemundo\Model\Form\ModelFormUpdate;
class AppFormUpdate extends ModelFormUpdate {
/**
* @var AppModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppModel();
}
}