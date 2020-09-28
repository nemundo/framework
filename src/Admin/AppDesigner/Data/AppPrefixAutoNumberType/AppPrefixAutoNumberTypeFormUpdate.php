<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
use Nemundo\Model\Form\ModelFormUpdate;
class AppPrefixAutoNumberTypeFormUpdate extends ModelFormUpdate {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadContainer() {
$this->model = new AppPrefixAutoNumberTypeModel();
}
}