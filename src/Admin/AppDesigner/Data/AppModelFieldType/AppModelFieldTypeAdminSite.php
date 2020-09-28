<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelFieldTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelFieldTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelFieldTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}