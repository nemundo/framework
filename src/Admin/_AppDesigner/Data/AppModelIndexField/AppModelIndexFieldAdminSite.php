<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelIndexFieldAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelIndexFieldModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelIndexFieldModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}